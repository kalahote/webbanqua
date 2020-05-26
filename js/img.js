doFadeObjects = new Object();
doFadeTimers = new Object();

function doFade(object, destOp, rate, delta){
if (!document.all)
return
    if (object != "[object]"){  
        setTimeout("doFade("+object+","+destOp+","+rate+","+delta+")",0);
        return;
    }
        
    clearTimeout(doFadeTimers[object.sourceIndex]);
    
    diff = destOp-object.filters.alpha.opacity;
    direction = 1;
    if (object.filters.alpha.opacity > destOp){
        direction = -1;
    }
    delta=Math.min(direction*diff,delta);
    object.filters.alpha.opacity+=direction*delta;

    if (object.filters.alpha.opacity != destOp){
        doFadeObjects[object.sourceIndex]=object;
        doFadeTimers[object.sourceIndex]=setTimeout("doFade(doFadeObjects["+object.sourceIndex+"],"+destOp+","+rate+","+delta+")",rate);
    }
}

