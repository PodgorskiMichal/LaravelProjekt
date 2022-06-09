/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/deleteCategory.js":
/*!****************************************!*\
  !*** ./resources/js/deleteCategory.js ***!
  \****************************************/
/***/ (() => {

eval("$(function () {\n  $('.deleteCategory').click(function () {\n    var _this = this;\n\n    Swal.fire({\n      title: 'Czy na pewno chcesz usunąć kategorię?',\n      text: 'Spowoduje to usunięcie wszystkich produktów z tej kategorii!',\n      icon: 'warning',\n      showCancelButton: true,\n      confirmButtonColor: '#5aae00',\n      cancelButtonColor: '#d33',\n      confirmButtonText: 'Tak',\n      cancelButtonText: 'Nie'\n    }).then(function (result) {\n      if (result.value) {\n        $.ajax({\n          method: \"DELETE\",\n          url: deleteURL + $(_this).data(\"id\")\n        }).done(function (data) {\n          window.location.reload();\n        }).fail(function (data) {\n          Swal.fire({\n            icon: data.responseJSON.status,\n            title: 'Uups...',\n            text: data.responseJSON.message\n          });\n        });\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiY2xpY2siLCJTd2FsIiwiZmlyZSIsInRpdGxlIiwidGV4dCIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvbkNvbG9yIiwiY2FuY2VsQnV0dG9uQ29sb3IiLCJjb25maXJtQnV0dG9uVGV4dCIsImNhbmNlbEJ1dHRvblRleHQiLCJ0aGVuIiwicmVzdWx0IiwidmFsdWUiLCJhamF4IiwibWV0aG9kIiwidXJsIiwiZGVsZXRlVVJMIiwiZGF0YSIsImRvbmUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCIsImZhaWwiLCJyZXNwb25zZUpTT04iLCJzdGF0dXMiLCJtZXNzYWdlIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9kZWxldGVDYXRlZ29yeS5qcz9hZWVlIl0sInNvdXJjZXNDb250ZW50IjpbIiQoZnVuY3Rpb24oKSB7XG5cbiAgICAkKCcuZGVsZXRlQ2F0ZWdvcnknKS5jbGljayggZnVuY3Rpb24oKSB7XG4gICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICB0aXRsZTogJ0N6eSBuYSBwZXdubyBjaGNlc3ogdXN1bsSFxIcga2F0ZWdvcmnEmT8nLFxuICAgICAgICAgICAgdGV4dDogJ1Nwb3dvZHVqZSB0byB1c3VuacSZY2llIHdzenlzdGtpY2ggcHJvZHVrdMOzdyB6IHRlaiBrYXRlZ29yaWkhJyxcbiAgICAgICAgICAgIGljb246ICd3YXJuaW5nJyxcbiAgICAgICAgICAgIHNob3dDYW5jZWxCdXR0b246IHRydWUsXG4gICAgICAgICAgICBjb25maXJtQnV0dG9uQ29sb3I6ICcjNWFhZTAwJyxcbiAgICAgICAgICAgIGNhbmNlbEJ1dHRvbkNvbG9yOiAnI2QzMycsXG4gICAgICAgICAgICBjb25maXJtQnV0dG9uVGV4dDogJ1RhaycsXG4gICAgICAgICAgICBjYW5jZWxCdXR0b25UZXh0OiAnTmllJ1xuICAgICAgICB9KS50aGVuKChyZXN1bHQpID0+IHtcbiAgICAgICAgICAgIGlmIChyZXN1bHQudmFsdWUpIHtcbiAgICAgICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgICAgICBtZXRob2Q6IFwiREVMRVRFXCIsXG4gICAgICAgICAgICAgICAgICAgIHVybDogZGVsZXRlVVJMICsgJCh0aGlzKS5kYXRhKFwiaWRcIilcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZG9uZShmdW5jdGlvbiggZGF0YSApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24oIGRhdGEgKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGljb246IGRhdGEucmVzcG9uc2VKU09OLnN0YXR1cyxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogJ1V1cHMuLi4nLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IGRhdGEucmVzcG9uc2VKU09OLm1lc3NhZ2VcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pO1xuXG59KTtcbiJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFXO0VBRVRBLENBQUMsQ0FBQyxpQkFBRCxDQUFELENBQXFCQyxLQUFyQixDQUE0QixZQUFXO0lBQUE7O0lBQ25DQyxJQUFJLENBQUNDLElBQUwsQ0FBVTtNQUNOQyxLQUFLLEVBQUUsdUNBREQ7TUFFTkMsSUFBSSxFQUFFLDhEQUZBO01BR05DLElBQUksRUFBRSxTQUhBO01BSU5DLGdCQUFnQixFQUFFLElBSlo7TUFLTkMsa0JBQWtCLEVBQUUsU0FMZDtNQU1OQyxpQkFBaUIsRUFBRSxNQU5iO01BT05DLGlCQUFpQixFQUFFLEtBUGI7TUFRTkMsZ0JBQWdCLEVBQUU7SUFSWixDQUFWLEVBU0dDLElBVEgsQ0FTUSxVQUFDQyxNQUFELEVBQVk7TUFDaEIsSUFBSUEsTUFBTSxDQUFDQyxLQUFYLEVBQWtCO1FBQ2RkLENBQUMsQ0FBQ2UsSUFBRixDQUFPO1VBQ0hDLE1BQU0sRUFBRSxRQURMO1VBRUhDLEdBQUcsRUFBRUMsU0FBUyxHQUFHbEIsQ0FBQyxDQUFDLEtBQUQsQ0FBRCxDQUFRbUIsSUFBUixDQUFhLElBQWI7UUFGZCxDQUFQLEVBSUtDLElBSkwsQ0FJVSxVQUFVRCxJQUFWLEVBQWlCO1VBQ25CRSxNQUFNLENBQUNDLFFBQVAsQ0FBZ0JDLE1BQWhCO1FBQ0gsQ0FOTCxFQU9LQyxJQVBMLENBT1UsVUFBVUwsSUFBVixFQUFpQjtVQUNuQmpCLElBQUksQ0FBQ0MsSUFBTCxDQUFVO1lBQ05HLElBQUksRUFBRWEsSUFBSSxDQUFDTSxZQUFMLENBQWtCQyxNQURsQjtZQUVOdEIsS0FBSyxFQUFFLFNBRkQ7WUFHTkMsSUFBSSxFQUFFYyxJQUFJLENBQUNNLFlBQUwsQ0FBa0JFO1VBSGxCLENBQVY7UUFLSCxDQWJMO01BY0g7SUFDSixDQTFCRDtFQTJCSCxDQTVCRDtBQThCSCxDQWhDQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2RlbGV0ZUNhdGVnb3J5LmpzLmpzIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/deleteCategory.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/deleteCategory.js"]();
/******/ 	
/******/ })()
;