'use strict';

kruvbook.controller('FeedCtrl', function($scope, $q, ActivitiesLoaderService) {
        $scope.activityLogs = [];

        $scope.loadMore = function() {
            ActivitiesLoaderService.loadMore()
                .then(function(data) {
                    $scope.activityLogs = $scope.activityLogs.concat(data);
                }, function(data) {
                    // @TODO - show error here when connection to the server failed
                    console.log("Fetching river items from the server failed!");
                });
        }

        $scope.loadMore();
    }
);