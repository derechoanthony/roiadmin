 function includes(file) {
    var script  = document.createElement('script');
    script.src  = file;
    script.type = 'text/javascript';
    script.defer = true;
    console.log(script);
    document.getElementsByTagName('head').item(0).appendChild(script);
  }