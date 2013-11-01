:: Tell sass to watch the scss file and automatically create the css version - Michael Cook 2013
:: Note - there is a chrome debugger for sass http://bricss.net/post/33788072565/using-sass-source-maps-in-webkit-inspector
:: https://chrome.google.com/webstore/detail/sass-inspector/lkofmbmllpgfbnonmnenkiakimpgoamn?hl=en
:: -g is debug info for plugins
:: --style compressed is minified

@echo off
mode con cols=56 lines=10 >nul
color 5F
echo.
echo   CSS file will now be created automatically from SCSS.
echo   (until you close this window)
echo.
sass --watch --style compressed lemonGridCompilation.scss:../lemongrid.css

echo.
if %errorlevel% neq 0 (
echo There was a problem..
)

pause
echo.
exit