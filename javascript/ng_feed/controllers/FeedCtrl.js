'use strict';

kruvbook.controller('FeedCtrl', function ($scope, $q, ActivitiesLoaderService, PubsubBroker) {
        /** Vars **/
        $scope.activityLogs = [];
        $scope.unseenActivityLogs = [];

        /** Functions **/
        $scope.loadMore = function () {
            ActivitiesLoaderService.loadMore()
                .then(function (data) {
                    $scope.activityLogs = $scope.activityLogs.concat(data);
                    $scope.errorMsg = '';
                }, function (data) {
                    $scope.errorMsg = "houston we have a problem - we can not fetch you'r feed any more...";
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

        $scope.unseenActivityClicked = function () {
            PubsubBroker.publish('newstories-seen');
        }

        /**
         * Publish this event when you wish to merge the unseen activities with the news feed
         */
        PubsubBroker.subscribe('newstories-seen', function () {
            $scope.activityLogs = $scope.activityLogs.concat($scope.unseenActivityLogs);
            $scope.unseenActivityLogs = [];
        });

        /** Init **/
        $scope.loadMore();
    }
);