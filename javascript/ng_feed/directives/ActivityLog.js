'use string';

kruvbook.directive('activityLog', function() {
    return {
        restrict: 'E',
        scope: {
            activityLog: '=item'
        },
        templateUrl: 'mod/smartfeed/javascript/ng_feed/partials/ActivityLogPartial.html',
        link: function(scope, element, attrs) {
            // This can be made by convention over configuarion if it gets complicated
            var templates = [{
                'name': 'ElggPost',
                'url': 'mod/smartfeed/javascript/ng_feed/partials/ElggPostActivityPartial.html'
            }];

            scope.getPartialUrl = function(type) {
                var found = _.find(templates, function(elem) {
                    if (elem.hasOwnProperty('name')){
                        return elem['name'] === type;
                    }
                });

                if (found) {
                    return found.url;
                }
                return '';
            }
        }
    };
});



