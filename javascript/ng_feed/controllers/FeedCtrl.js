'use strict';

kruvbook.controller('FeedCtrl', function($scope, $q, RiverLoaderService) {
        $scope.riverItems = [];

        $scope.loadMore = function() {

            RiverLoaderService.loadMore()
                .then(function(data) {
                    $scope.riverItems = $scope.riverItems.concat(JSON.parse(data));
                }, function(data) {
                    console.log("Fetching river items from the server failed!");
                });
        }

        $scope.loadMore();
    }
);