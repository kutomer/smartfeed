'use string';

kruvbook.directive('riverItem', function() {
    console.log('test');
    return {
        restrict: 'E',
        scope: {
            riverItem: '=item'
        },
        templateUrl: 'mod/smartfeed/javascript/ng_feed/partials/RiverItemView.html'
    };
});