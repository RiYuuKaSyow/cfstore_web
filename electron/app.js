const electron = require('electron') ;
const app = electron.app ;
const browser = electron.BrowserWindow ;

let mainwindow ;

function createwindow(){
    mainwindow = new browser({
        width : 800 ,
        height : 600 ,
    });
    
    mainwindow.loadFile('shop.html') ;
    mainwindow.webContents.openDevTools() ;
    
    mainwindow.on('closed',function(){
        mainwindow = null ;
    }) ;
}

app.on('ready' , createwindow) ;

app.on('window-all-closed',function(){
    app.quit() ;
});

app.on('active' , function(){
    if( mainwindow == null ){
        createwindow() ;
    }
});