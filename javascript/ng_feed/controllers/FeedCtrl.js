'use strict';

kruvbook.controller('FeedCtrl', function($scope, $q, ActivitiesLoaderService) {
        $scope.activityLogs = [];

        $scope.loadMore = function() {
            ActivitiesLoaderService.loadMore()
                .then(function(data) {
                    $scope.activityLogs = $scope.activityLogs.concat(data);
                    $scope.errorMsg = '';
                }, function(data) {
                    $scope.errorMsg = "Sorry amigo, it seems like we have a problem fetching you'r feed...";
                });
        }

        $scope.refresh = function() {
            ActivitiesLoaderService.refresh()
                .then(function(data) {
                    // @TODO:
                    // 1. use _ to add the new acrivities log at the begining
                    // 2. display cool message like in Facebook mobile application - "You have 9 new unread msgs"
                    $scope.activityLogs = $scope.activityLogs.concat(data);
                });
        }

        $scope.loadMore();
    }
);