'use string';

kruvbook.directive('riverItem', function() {
    return {
        restrict: 'E',
        scope: {
            activityLog: '=item'
        },
        templateUrl: 'mod/smartfeed/javascript/ng_feed/partials/ActivityLogPartial.html',
        link: function(scope, element, attrs) {
            scope.getPartialUrl = function(action, type) {

            }

            scope.templates = [{
               'name': 'comment',
                'url': 'mod/smartfeed/javascript/ng_feed/partials/CommentView.html'
            }];
        }
    };
});



