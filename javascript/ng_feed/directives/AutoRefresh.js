'use string';

kruvbook.directive('autoRefresh', function($timeout) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            // $interval is not yet stable :(
            setInterval(function() {
                // Call the auto refresh funaction on the parent scope
                scope.$apply(attrs.autoRefresh);
            }, attrs.refreshInterval);
        }
    }
});



