'use strict';

kruvbook.controller('FeedCtrl', function ($scope, $q, ActivitiesLoaderService) {
        $scope.activityLogs = [];
        $scope.unseenActivityLogs = [];

        $scope.loadMore = function () {
            ActivitiesLoaderService.loadMore()
                .then(function (data) {
                    $scope.activityLogs = $scope.activityLogs.concat(data);
                    $scope.errorMsg = '';
                }, function (data) {
                    $scope.errorMsg = "Sorry amigo, it seems like we have a problem fetching you'r feed...";
                });
        }

        $scope.refresh = function () {
            ActivitiesLoaderService.refresh()
                .then(function (data) {
                    $scope.unseenActivityLogs = $scope.unseenActivityLogs.concat(data);
                });
        }

        $scope.unseenActivitesTitle = function () {
            return 'You have ' + $scope.unseenActivityLogs.length + ' new stories:';
        }

        $scope.loadMore();
    }
);