'use strict';

kruvbook.factory('PubsubBroker', function ($q) {
        var cache = {};

        return {
            'publish': function (topic, eventArgs) {
                cache[topic] && _.each(cache[topic], function (elem) {
                    elem.apply(null, eventArgs || {});
                });
            },
            'subscribe': function (topic, callback) {
                if (!cache[topic]) {
                    cache[topic] = [];
                }
                cache[topic].push(callback);

                return [topic, callback];
            },
            'unsubscribe': function (handler) {
                var topic = handler[0];
                cache[topic] && _.each(cache[topic], function (index) {
                    if (this === handler[1]) {
                        cache[topic].splice(index, 1);
                    }
                });
            }
        };
    }
);