
/* 1. Mouse over a button */
function mouseOver(objThis) {
    var index;
    
    index = objThis.src.indexOf("left_button_list.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_list_hover.png";
        return;
    }
    
    index = objThis.src.indexOf("left_button_add.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_add_hover.png";
        return;
    }
    
    index = objThis.src.indexOf("left_button_update.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_update_hover.png";
        return;
    }
    
    index = objThis.src.indexOf("left_button_delete.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_delete_hover.png";
        return;
    }
}

function mouseOut(objThis) {
    var index;
    
    index = objThis.src.indexOf("left_button_list_hover.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_list.png";
        return;
    }
    
    index = objThis.src.indexOf("left_button_add_hover.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_add.png";
        return;
    }
    
    index = objThis.src.indexOf("left_button_update_hover.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_update.png";
        return;
    }
    
    index = objThis.src.indexOf("left_button_delete_hover.png");
    if (index > 0) {
        objThis.src = "../../Images/left_button_delete.png";
        return;
    }
}

/* 2. Check All Items and Highlight Selected Row */
function Check_Click(objRef)
{
    //Get the Row based on checkbox
    var row = objRef.parentNode.parentNode;
    if(objRef.checked)
    {
        //If checked change color to Aqua
        row.style.backgroundColor = "aqua";
    }
    else
    {   
        //If not checked change back to original color
        if(row.rowIndex % 2 == 0)
        {
           //Alternating Row Color
           row.style.backgroundColor = "white";
        }
        else
        {
           row.style.backgroundColor = "#F7F7DE";
        }
    }

    //Get the reference of GridView
    var GridView = row.parentNode;

    //Get all input elements in Gridview
    var inputList = GridView.getElementsByTagName("input");

    for (var i=0;i<inputList.length;i++)
    {
        //The First element is the Header Checkbox
        var headerCheckBox = inputList[0];

        //Based on all or none checkboxes
        //are checked check/uncheck Header Checkbox
        var checked = true;
        if(inputList[i].type == "checkbox" && inputList[i] != headerCheckBox)
        {
            if(!inputList[i].checked)
            {
                checked = false;
                break;
            }
        }
    }
    headerCheckBox.checked = checked;
}
function checkAll(objRef)
{
    var GridView = objRef.parentNode.parentNode.parentNode;
    var inputList = GridView.getElementsByTagName("input");

    for (var i=0;i<inputList.length;i++)
    {
        //Get the Cell To find out ColumnIndex
        var row = inputList[i].parentNode.parentNode;

        if(inputList[i].type == "checkbox"  && objRef != inputList[i])
        {
            if (objRef.checked)
            {
                //If the header checkbox is checked
                //check all checkboxes
                //and highlight all rows

                row.style.backgroundColor = "aqua";
                inputList[i].checked=true;
            }
            else
            {
                //If the header checkbox is checked
                //uncheck all checkboxes
                //and change rowcolor back to original
                if(row.rowIndex % 2 == 0)
                {
                   //Alternating Row Color
                   row.style.backgroundColor = "white";
                }
                else
                {
                   row.style.backgroundColor = "#F7F7DE";
                }
                inputList[i].checked=false;
            }
        }
    }
}
function MouseEvents(objRef, evt)
{
    var checkbox = objRef.getElementsByTagName("input")[0];

    if (evt.type == "mouseover")
        objRef.style.backgroundColor = "#FFBFFE";
    else
    {
        if (checkbox.checked)
            objRef.style.backgroundColor = "aqua";
        else if(evt.type == "mouseout")
            if(objRef.rowIndex % 2 == 0)
            {
                //Alternating Row Color
                objRef.style.backgroundColor = "white";
            }
            else
                objRef.style.backgroundColor = "#F7F7DE";
    }
}

/* 3. Input numbers only and add comma to numbers */
function keypress(e)
{
    //Hàm dùng để ngăn người dùng nhập các ký tự khác ký tự số vào TextBox
    var keypressed = null;

    if (window.event)
        keypressed = window.event.keyCode; //IE
    else
        keypressed = e.which; //NON-IE, Standard

    if (keypressed == 0 || keypressed == 8 || keypressed == 46 || keypressed == 9) //Phím Delete và Phím Back
        return true;
		
    if (keypressed >= 65 && keypressed <= 90) // A->Z
		return false;
	if (keypressed >= 97 && keypressed <= 122) // a->z
		return false;	
	
    //CharCode của 0 là 48 (Theo bảng mã ASCII)
    //CharCode của 9 là 57 (Theo bảng mã ASCII)
    //if (keypressed < 48 || keypressed > 57)
    //    return false;

    return true;
}
function FormatCurrency(objNum)
{
    var num = objNum.value.replace('','');
    var ent, dec, dot;
    
    if (num != '' && num != objNum.oldvalue)
    {
        num = MoneyToNumber(num);
        
        if (!isNaN(num))
        {
            var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
            ent = num.split('.')[0];
            dec = num.split('.')[1];
            
            if (dec || ev.keyCode == 190)
            {
                dot = '.';
                if (dec.toString().length > 2) dec = dec.toString().substr(0,2);
            }
            else
            {
                dec = '';
                dot = '';
            }
            objNum.value = AddCommas(ent) + dot + dec;
            objNum.oldvalue = objNum.value;
        }
        objNum.value = '' + objNum.oldvalue;
    }
    
    return true;
}
function MoneyToNumber(num)
{
    return (num.replace(/,/g, ''));
}
function AddCommas(num)
{
    numArr=new String(num).split('').reverse();
    for (i=3;i<numArr.length;i+=3)
    {
         numArr[i]+=',';
    }
    return numArr.reverse().join('');
}
function number_onblur(objNum)
{
    var num = objNum.oldvalue;
    if (num.charAt(num.toString().length-1) == '.') num = num.replace('.','');
    objNum.value = "" + num;
}

/* 4. Mouse over a Textbox */
function mouseOverTextbox(objThis) {
    objThis.style.backgroundImage = "url(images/text-bg2.gif)";
    document.getElementById(objThis.id).select();
}

function mouseOutTextbox(objThis) {
    objThis.style.backgroundImage = "url(images/text-bg.gif)";
}