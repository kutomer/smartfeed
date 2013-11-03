'use strict';

kruvbook.factory('ActivitiesLoaderService', function($http, $q) {
        var lastItemGuid = null;

        return {
            'loadMore': function() {
                var deferred = $q.defer(),
                    getFeedUrl = "";

                // Build the http query string
                getFeedUrl += elgg.config.wwwroot
                    + '/services/api/rest/json/?method=get_feed'
                    + '&user_guid=' + elgg.get_logged_in_user_guid();

                if(lastItemGuid !== null) {
                    getFeedUrl += '&last_item_guid=' + lastItemGuid;
                }

                // Fetch the river items from the DataBase
                $http({
                    method: 'GET',
                    url: getFeedUrl}
                ).success(function(data, status, headers, config) {
                        if(data.status !== 0) {
                            deferred.reject();
                        }

                        deferred.resolve(JSON.parse(data.result));
                    }).
                    error(function(data, status, headers, config) {
                        deferred.reject();
                    });

                return deferred.promise;
            }
        };
    }
);