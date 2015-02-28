angular.module('MyApp', ['timer']);
function TodosController ($scope, $http) {
	// body...
	// $scope.todos = [
	// 	{ department: 'Yoi Cooy' },
	// 	{ department: 'Mantap Laah' }
	// ];

	$http.get('http://localhost:81/e-auction/public/vendor/bidding').success(function(todos) {
		$scope.todos = todos;
	// 	// check for item changes
 	 });
	//console.log($http);
}

function TimeController($scope, $timeout) {
    $scope.counter = 30;
 
    var mytimeout = null; // the current timeoutID
 
    // actual timer method, counts down every second, stops on zero
     var onTimeout = function() {
        if($scope.counter ===  0) {
            $scope.$broadcast('timer-stopped', 0);
            $timeout.cancel(mytimeout);
            return;
        }
        $scope.counter--;
        mytimeout = $timeout($scope.onTimeout, 1000);
    };
 
    // $scope.startTimer = function() {
    //     mytimeout = $timeout($scope.onTimeout, 1000);
    // };
 
    // // stops and resets the current timer
    // $scope.stopTimer = function() {
    //     $scope.$broadcast('timer-stopped', $scope.counter);
    //     $scope.counter = 30;
    //     $timeout.cancel(mytimeout);
    // };
 
    // triggered, when the timer stops, you can do something here, maybe show a visual indicator or vibrate the device
    $scope.$on('timer-stopped', function(event, remaining) {
        if(remaining === 0) {
            console.log('your time ran out!');
        }
    });

    onTimeout();
  }


// function MyAppController($scope) {
//             $scope.timerRunning = true;
 
//             $scope.startTimer = function (){
//                 $scope.$broadcast('timer-start');
//                 $scope.timerRunning = true;
//             };
 
//             $scope.stopTimer = function (){
//                 $scope.$broadcast('timer-stop');
//                 $scope.timerRunning = false;
//             };
 
//             $scope.$on('timer-stopped', function (event, data){
//                 console.log('Timer Stopped - data = ', data);
//             });
//         }
//         MyAppController.$inject = ['$scope'];


// var timestamp = '';
// function TodosController($scope, $http, $timeout) { 
//     $scope.todos = [];
//     $scope.newsRequest = function(){
//         $http.get('http://localhost:81/e-auction/public/vendor/bidding' + timestamp).success(function(data) {
//             $scope.todos = data.recent.concat($scope.todos); 
//             if (data.recent[0] != null){
//                 timestamp = data.recent[0].time;
//             }
//         });
//     };
// $scope.newsRequest();
// setInterval(function(){
//     $scope.$apply(function(){
//            $scope.newsRequest();
//     });
// }, 5000);

// angular.module('MyApp', ['timer'])

// 	.controller('TodosController', 
// 	function ($scope, $http) {
// 		$http.get('http://localhost:81/e-auction/public/vendor/bidding').success(function(todos) {
// 			$scope.todos = todos;
// 		// 	// check for item changes
// 	 	 });
// 		//console.log($http);
// 	}
// 	});

//   .controller('TimerCtrl', function($scope, $timeout) {
//     $scope.counter = 30;
 
//     var mytimeout = null; // the current timeoutID
 
//     // actual timer method, counts down every second, stops on zero
//     $scope.onTimeout = function() {
//         if($scope.counter ===  0) {
//             $scope.$broadcast('timer-stopped', 0);
//             $timeout.cancel(mytimeout);
//             return;
//         }
//         $scope.counter--;
//         mytimeout = $timeout($scope.onTimeout, 1000);
//     };
 
//     $scope.startTimer = function() {
//         mytimeout = $timeout($scope.onTimeout, 1000);
//     };
 
//     // stops and resets the current timer
//     $scope.stopTimer = function() {
//         $scope.$broadcast('timer-stopped', $scope.counter);
//         $scope.counter = 30;
//         $timeout.cancel(mytimeout);
//     };
 
//     // triggered, when the timer stops, you can do something here, maybe show a visual indicator or vibrate the device
//     $scope.$on('timer-stopped', function(event, remaining) {
//         if(remaining === 0) {
//             console.log('your time ran out!');
//         }
//     });
//   }); 