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

/***/ "./resources/js/delete.js":
/*!********************************!*\
  !*** ./resources/js/delete.js ***!
  \********************************/
/***/ (() => {

eval("$(function () {\n  $('.delete').click(function () {\n    var _this = this;\n\n    var swalWithBootstrapButtons = Swal.mixin({\n      customClass: {\n        confirmButton: 'btn btn-success',\n        cancelButton: 'btn btn-danger'\n      },\n      buttonsStyling: false\n    });\n    swalWithBootstrapButtons.fire({\n      title: 'Czy na pewno chcesz usunąć rekord?',\n      //TODO: tytuł dać odwołanie tak jak do deleteUrl i w parametrze przekazywać odpowiedni tytuł\n      icon: 'warning',\n      showCancelButton: true,\n      confirmButtonText: 'TAK',\n      cancelButtonText: 'NIE',\n      reverseButtons: true\n    }).then(function (result) {\n      if (result.isConfirmed) {\n        $.ajax({\n          method: \"DELETE\",\n          url: deleteUrl + $(_this).data(\"id\")\n        }).done(function (data) {\n          window.location.reload();\n        }).fail(function (data) {\n          Swal.fire({\n            icon: data.responseJSON.status,\n            title: data.responseJSON.message\n          });\n        });\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiY2xpY2siLCJzd2FsV2l0aEJvb3RzdHJhcEJ1dHRvbnMiLCJTd2FsIiwibWl4aW4iLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJjYW5jZWxCdXR0b24iLCJidXR0b25zU3R5bGluZyIsImZpcmUiLCJ0aXRsZSIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvblRleHQiLCJjYW5jZWxCdXR0b25UZXh0IiwicmV2ZXJzZUJ1dHRvbnMiLCJ0aGVuIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJhamF4IiwibWV0aG9kIiwidXJsIiwiZGVsZXRlVXJsIiwiZGF0YSIsImRvbmUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCIsImZhaWwiLCJyZXNwb25zZUpTT04iLCJzdGF0dXMiLCJtZXNzYWdlIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9kZWxldGUuanM/NmMxMSJdLCJzb3VyY2VzQ29udGVudCI6WyIkKGZ1bmN0aW9uICgpIHtcbiAgICAkKCcuZGVsZXRlJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCBzd2FsV2l0aEJvb3RzdHJhcEJ1dHRvbnMgPSBTd2FsLm1peGluKHtcbiAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogJ2J0biBidG4tc3VjY2VzcycsXG4gICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uOiAnYnRuIGJ0bi1kYW5nZXInXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlXG4gICAgICAgIH0pXG5cbiAgICAgICAgc3dhbFdpdGhCb290c3RyYXBCdXR0b25zLmZpcmUoe1xuICAgICAgICAgICAgdGl0bGU6ICdDenkgbmEgcGV3bm8gY2hjZXN6IHVzdW7EhcSHIHJla29yZD8nLFxuXG4gICAgICAgICAgICAvL1RPRE86IHR5dHXFgiBkYcSHIG9kd2/FgmFuaWUgdGFrIGphayBkbyBkZWxldGVVcmwgaSB3IHBhcmFtZXRyemUgcHJ6ZWthenl3YcSHIG9kcG93aWVkbmkgdHl0dcWCXG4gICAgICAgICAgICBpY29uOiAnd2FybmluZycsXG4gICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6ICdUQUsnLFxuICAgICAgICAgICAgY2FuY2VsQnV0dG9uVGV4dDogJ05JRScsXG4gICAgICAgICAgICByZXZlcnNlQnV0dG9uczogdHJ1ZVxuICAgICAgICB9KS50aGVuKChyZXN1bHQpID0+IHtcbiAgICAgICAgICAgIGlmIChyZXN1bHQuaXNDb25maXJtZWQpIHtcbiAgICAgICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgICAgICBtZXRob2Q6IFwiREVMRVRFXCIsXG4gICAgICAgICAgICAgICAgICAgIHVybDogZGVsZXRlVXJsICsgJCh0aGlzKS5kYXRhKFwiaWRcIilcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZG9uZShmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uLnJlbG9hZCgpO1xuICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgU3dhbC5maXJlKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpY29uOiBkYXRhLnJlc3BvbnNlSlNPTi5zdGF0dXMsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGl0bGU6IGRhdGEucmVzcG9uc2VKU09OLm1lc3NhZ2VcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSlcbiAgICB9KTtcbn0pO1xuIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDLFlBQVk7RUFDVkEsQ0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhQyxLQUFiLENBQW1CLFlBQVk7SUFBQTs7SUFDM0IsSUFBTUMsd0JBQXdCLEdBQUdDLElBQUksQ0FBQ0MsS0FBTCxDQUFXO01BQ3hDQyxXQUFXLEVBQUU7UUFDVEMsYUFBYSxFQUFFLGlCQUROO1FBRVRDLFlBQVksRUFBRTtNQUZMLENBRDJCO01BS3hDQyxjQUFjLEVBQUU7SUFMd0IsQ0FBWCxDQUFqQztJQVFBTix3QkFBd0IsQ0FBQ08sSUFBekIsQ0FBOEI7TUFDMUJDLEtBQUssRUFBRSxvQ0FEbUI7TUFHMUI7TUFDQUMsSUFBSSxFQUFFLFNBSm9CO01BSzFCQyxnQkFBZ0IsRUFBRSxJQUxRO01BTTFCQyxpQkFBaUIsRUFBRSxLQU5PO01BTzFCQyxnQkFBZ0IsRUFBRSxLQVBRO01BUTFCQyxjQUFjLEVBQUU7SUFSVSxDQUE5QixFQVNHQyxJQVRILENBU1EsVUFBQ0MsTUFBRCxFQUFZO01BQ2hCLElBQUlBLE1BQU0sQ0FBQ0MsV0FBWCxFQUF3QjtRQUNwQmxCLENBQUMsQ0FBQ21CLElBQUYsQ0FBTztVQUNIQyxNQUFNLEVBQUUsUUFETDtVQUVIQyxHQUFHLEVBQUVDLFNBQVMsR0FBR3RCLENBQUMsQ0FBQyxLQUFELENBQUQsQ0FBUXVCLElBQVIsQ0FBYSxJQUFiO1FBRmQsQ0FBUCxFQUlLQyxJQUpMLENBSVUsVUFBVUQsSUFBVixFQUFnQjtVQUNsQkUsTUFBTSxDQUFDQyxRQUFQLENBQWdCQyxNQUFoQjtRQUNILENBTkwsRUFPS0MsSUFQTCxDQU9VLFVBQVVMLElBQVYsRUFBZ0I7VUFDbEJwQixJQUFJLENBQUNNLElBQUwsQ0FBVTtZQUNORSxJQUFJLEVBQUVZLElBQUksQ0FBQ00sWUFBTCxDQUFrQkMsTUFEbEI7WUFFTnBCLEtBQUssRUFBRWEsSUFBSSxDQUFDTSxZQUFMLENBQWtCRTtVQUZuQixDQUFWO1FBSUgsQ0FaTDtNQWFIO0lBQ0osQ0F6QkQ7RUEwQkgsQ0FuQ0Q7QUFvQ0gsQ0FyQ0EsQ0FBRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9kZWxldGUuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/delete.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/delete.js"]();
/******/ 	
/******/ })()
;