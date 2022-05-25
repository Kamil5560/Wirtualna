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

eval("$(function () {\n  $('.delete').click(function () {\n    var _this = this;\n\n    var swalWithBootstrapButtons = Swal.mixin({\n      customClass: {\n        confirmButton: 'btn btn-success',\n        cancelButton: 'btn btn-danger'\n      },\n      buttonsStyling: false\n    });\n    swalWithBootstrapButtons.fire({\n      title: 'Czy na pewno chcesz usunąć rekord?',\n      icon: 'warning',\n      showCancelButton: true,\n      confirmButtonText: 'TAK',\n      cancelButtonText: 'NIE',\n      reverseButtons: true\n    }).then(function (result) {\n      if (result.isConfirmed) {\n        $.ajax({\n          method: \"DELETE\",\n          url: deleteUrl + $(_this).data(\"id\")\n        }).done(function (data) {\n          window.location.reload();\n        }).fail(function (data) {\n          Swal.fire({\n            icon: data.responseJSON.status,\n            title: data.responseJSON.message\n          });\n        });\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyIkIiwiY2xpY2siLCJzd2FsV2l0aEJvb3RzdHJhcEJ1dHRvbnMiLCJTd2FsIiwibWl4aW4iLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJjYW5jZWxCdXR0b24iLCJidXR0b25zU3R5bGluZyIsImZpcmUiLCJ0aXRsZSIsImljb24iLCJzaG93Q2FuY2VsQnV0dG9uIiwiY29uZmlybUJ1dHRvblRleHQiLCJjYW5jZWxCdXR0b25UZXh0IiwicmV2ZXJzZUJ1dHRvbnMiLCJ0aGVuIiwicmVzdWx0IiwiaXNDb25maXJtZWQiLCJhamF4IiwibWV0aG9kIiwidXJsIiwiZGVsZXRlVXJsIiwiZGF0YSIsImRvbmUiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsInJlbG9hZCIsImZhaWwiLCJyZXNwb25zZUpTT04iLCJzdGF0dXMiLCJtZXNzYWdlIl0sInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy9kZWxldGUuanM/NmMxMSJdLCJzb3VyY2VzQ29udGVudCI6WyIkKGZ1bmN0aW9uICgpIHtcbiAgICAkKCcuZGVsZXRlJykuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCBzd2FsV2l0aEJvb3RzdHJhcEJ1dHRvbnMgPSBTd2FsLm1peGluKHtcbiAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogJ2J0biBidG4tc3VjY2VzcycsXG4gICAgICAgICAgICAgICAgY2FuY2VsQnV0dG9uOiAnYnRuIGJ0bi1kYW5nZXInXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlXG4gICAgICAgIH0pXG5cbiAgICAgICAgc3dhbFdpdGhCb290c3RyYXBCdXR0b25zLmZpcmUoe1xuICAgICAgICAgICAgdGl0bGU6ICdDenkgbmEgcGV3bm8gY2hjZXN6IHVzdW7EhcSHIHJla29yZD8nLFxuICAgICAgICAgICAgaWNvbjogJ3dhcm5pbmcnLFxuICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiAnVEFLJyxcbiAgICAgICAgICAgIGNhbmNlbEJ1dHRvblRleHQ6ICdOSUUnLFxuICAgICAgICAgICAgcmV2ZXJzZUJ1dHRvbnM6IHRydWVcbiAgICAgICAgfSkudGhlbigocmVzdWx0KSA9PiB7XG4gICAgICAgICAgICBpZiAocmVzdWx0LmlzQ29uZmlybWVkKSB7XG4gICAgICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiBcIkRFTEVURVwiLFxuICAgICAgICAgICAgICAgICAgICB1cmw6IGRlbGV0ZVVybCArICQodGhpcykuZGF0YShcImlkXCIpXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogZGF0YS5yZXNwb25zZUpTT04uc3RhdHVzLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBkYXRhLnJlc3BvbnNlSlNPTi5tZXNzYWdlXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pXG4gICAgfSk7XG59KTtcbiJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQyxZQUFZO0VBQ1ZBLENBQUMsQ0FBQyxTQUFELENBQUQsQ0FBYUMsS0FBYixDQUFtQixZQUFZO0lBQUE7O0lBQzNCLElBQU1DLHdCQUF3QixHQUFHQyxJQUFJLENBQUNDLEtBQUwsQ0FBVztNQUN4Q0MsV0FBVyxFQUFFO1FBQ1RDLGFBQWEsRUFBRSxpQkFETjtRQUVUQyxZQUFZLEVBQUU7TUFGTCxDQUQyQjtNQUt4Q0MsY0FBYyxFQUFFO0lBTHdCLENBQVgsQ0FBakM7SUFRQU4sd0JBQXdCLENBQUNPLElBQXpCLENBQThCO01BQzFCQyxLQUFLLEVBQUUsb0NBRG1CO01BRTFCQyxJQUFJLEVBQUUsU0FGb0I7TUFHMUJDLGdCQUFnQixFQUFFLElBSFE7TUFJMUJDLGlCQUFpQixFQUFFLEtBSk87TUFLMUJDLGdCQUFnQixFQUFFLEtBTFE7TUFNMUJDLGNBQWMsRUFBRTtJQU5VLENBQTlCLEVBT0dDLElBUEgsQ0FPUSxVQUFDQyxNQUFELEVBQVk7TUFDaEIsSUFBSUEsTUFBTSxDQUFDQyxXQUFYLEVBQXdCO1FBQ3BCbEIsQ0FBQyxDQUFDbUIsSUFBRixDQUFPO1VBQ0hDLE1BQU0sRUFBRSxRQURMO1VBRUhDLEdBQUcsRUFBRUMsU0FBUyxHQUFHdEIsQ0FBQyxDQUFDLEtBQUQsQ0FBRCxDQUFRdUIsSUFBUixDQUFhLElBQWI7UUFGZCxDQUFQLEVBSUtDLElBSkwsQ0FJVSxVQUFVRCxJQUFWLEVBQWdCO1VBQ2xCRSxNQUFNLENBQUNDLFFBQVAsQ0FBZ0JDLE1BQWhCO1FBQ0gsQ0FOTCxFQU9LQyxJQVBMLENBT1UsVUFBVUwsSUFBVixFQUFnQjtVQUNsQnBCLElBQUksQ0FBQ00sSUFBTCxDQUFVO1lBQ05FLElBQUksRUFBRVksSUFBSSxDQUFDTSxZQUFMLENBQWtCQyxNQURsQjtZQUVOcEIsS0FBSyxFQUFFYSxJQUFJLENBQUNNLFlBQUwsQ0FBa0JFO1VBRm5CLENBQVY7UUFJSCxDQVpMO01BYUg7SUFDSixDQXZCRDtFQXdCSCxDQWpDRDtBQWtDSCxDQW5DQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2RlbGV0ZS5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/delete.js\n");

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