angular.module('eventModule',[])
.config([function(){
	console.log("Event module:: config");
}])
.run([function () {
	console.log("Event Module::running");
}])
.controller('EventCtrl',['$scope',function ($scope){
	$scope.title ="abeng is my boy";
	$scope.menu=[
	{
		name:"home",
		href:"index.html"
	},
	{
		name:"Contact",
		href:"Contact.html"
	}

  ]
  $scope.index=0;
  $scope.setIndex=function(val)
  {
  	$scope.index = val;
  }
  $scope.getIndex=function(){
  	return($scope.index);
  }
  
}])
