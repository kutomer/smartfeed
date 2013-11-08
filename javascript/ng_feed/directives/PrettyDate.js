'use string';

kruvbook.directive('prettyDate', function () {
    return {
        restrict: 'E',
        scope: {
            unixBaseDate: '=date'
        },
        templateUrl: 'mod/smartfeed/javascript/ng_feed/partials/PrettyDatePartial.html',
        link: function (scope, element, attrs) {
            scope.showPrettyDate = function () {
                var d = new Date(scope.unixBaseDate * 1000);

                // @TODO - convert the date to a string like 'just added, few minutes ago...' can be done with an external plugin?

                return d.toString();
            }
        }
    };
});



