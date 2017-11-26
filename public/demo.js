$(
  function()
  {
    var text = $('').text();

    var timer;

    countDown(text);

    $().click(function() {
      $().fadeOut(800);
      if(timer)
      {
        clearInterval(timer);
        timer = setInerval(setClock,1000);
      }
    });


    function countDown(index) {
      if(index > 0)
      {
        setTimeout(function()
        {
          index --;
          $('').text(index);
          countDown(text);
        }
        },1000)
      }else {
        $("").fadeOut(800);
      }
    };

    var HH=0,MM=0,SS=0,str="";

    function setClock() {
      if(++SS==60)
      {
        if(++MM==60)
        {
          HH++;
          MM=;
        }
        SS=0;

      }
      str = "";
      str + = HH < 10 ? "0"+HH : HH;
      str + = MM < 10 ? "0"+MM : MM;
      str + = SS < 10 ? "0"+SS : SS;
      $('').text(str);
    /*  if(HH<10)
      {
        str += "0" + HH;
      }
      else {

        str += HH;
      }*/
    }


  // timer = setInerval(setClock,1000);


)
