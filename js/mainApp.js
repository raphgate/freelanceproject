angular.module('mainApp', ['eventModule'])
.config([function(){
	console.log("Configuration hook");
}])
.run([function () {
	console.log("Run hook");
}])
