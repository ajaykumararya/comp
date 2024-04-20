PageHelper = function( )
    {
    }
PageHelper.createInstance = function( doc, dynamicProperties )
{
    if( doc != null )
    {
        var helper = new PageHelper();
        return helper;
    }
    return null;
}

var sendemailvar=null;
var self_ptr_sms_email=null;
var sendsmsvar=null;
var self_ptr_sms=null;
var mystatus=null;
var indexTd=null;
var modelselectid=null;
var state_text_field_name="";
var fieldControlBox="";
var tableId="";
var  indexId=null;
var msgField=null;
var inputField=null;
var outputField=null;
var priceField=null;
var quantityField=null;
var itemTypeField=null;
var JSON;
/**
 * Sets the Email response box with the passed message
 * @param textToSet The message which is to be set in the Email response box
 */

PageHelper.prototype.deleteRecords=function(table_name,table_field_name,table_field_value)
{
    alert(table_name);
    alert(table_field_name);
    alert(table_field_value);
    
	var choice=confirm("Are You sure you want to Delete this Record permanently");
	if(choice){
	    var params="table_name="+table_name+"&table_field="+table_field_name+"&table_field_value="+table_field_value;
	    if(window.XMLHttpRequest)
	        this.sendsmsvar = new XMLHttpRequest();
	    else
	        this.sendsmsvar = new ActiveXObject("MSXML2.XMLHTTP");
	    var url = "delete.do";
	    this.sendsmsvar.onreadystatechange = this.deleteRecordsCallBack;
	    this.sendsmsvar.open( "POST", url,true );
	    this.sendsmsvar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    this.sendsmsvar.setRequestHeader("Content-length", params.length);
	    this.sendsmsvar.setRequestHeader("Connection", "close");
	    self_ptr_sms = this;
	    this.sendsmsvar.send(params);
	}
}
PageHelper.prototype.deleteRecordsCallBack=function()
{
    if(self_ptr_sms)
    {
        var ajaxvar = self_ptr_sms.sendsmsvar;
        if(ajaxvar.readyState == 4)
        {
            if(ajaxvar.status == 200)
            {
                window.location.reload();
            }
        }
    }
}
var fieldControlGloble;
PageHelper.prototype.getComboBox=function(tableName,getName,getId,byId,byValue,fieldControl)
{
	fieldControlGloble=fieldControl;
	if(document.getElementById(fieldControlGloble+'_loading')){
		document.getElementById(fieldControlGloble+'_loading').style.visibility="visible";
	}
   this.fieldControlBox=fieldControl;
   var params="tableName="+tableName+"&getName="+getName+"&getId="+getId+"&byId="+byId+"&byValue="+byValue;
    if(window.XMLHttpRequest)
        this.sendsmsvar = new XMLHttpRequest();
    else
        this.sendsmsvar = new ActiveXObject("MSXML2.XMLHTTP");
    var url = "/includes/getDropDown.php";
    this.sendsmsvar.onreadystatechange = this.getComboBoxCallBack;
    this.sendsmsvar.open( "POST", url,false );
    this.sendsmsvar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    this.sendsmsvar.setRequestHeader("Content-length", params.length);
    this.sendsmsvar.setRequestHeader("Connection", "close");
    self_ptr_sms = this;
    this.sendsmsvar.send(params);
}
PageHelper.prototype.getComboBoxCallBack=function()
{
    //alert("jdhjsaashj");
    if(self_ptr_sms)
    {
        var ajaxvar = self_ptr_sms.sendsmsvar;

        //alert(self_ptr_sms);
        if(ajaxvar.readyState == 4)
        {
            if(ajaxvar.status == 200)
            {
                var responsetext = ajaxvar.responseText;
				//alert(responsetext);
                self_ptr_sms.setComboBoxResponse(responsetext);
            }
        }
    }
}
/**
 * Sets the Email response box with the passed message
 * @param textToSet The message which is to be set in the Email response box
 */
PageHelper.prototype.setComboBoxResponse=function(textToSet)
{
	//alert(textToSet);
	
    var result=JSON && JSON.parse(textToSet) || $.parseJSON(textToSet);
    document.getElementById(self_ptr_sms.fieldControlBox).length = 0;
    var sel=document.getElementById(self_ptr_sms.fieldControlBox);
    var elOptNew = document.createElement('option');
    elOptNew.text = '--Select--' ;
    elOptNew.value = '';
    var elSel = document.getElementById(self_ptr_sms.fieldControlBox);
    try {
        elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
    }
    catch(ex) {
        elSel.add(elOptNew); // IE only
    }
    var maxItem=0;
    for(var j=0;j<result.length;j++){
            var elOptNew = document.createElement('option');
            elOptNew.text = result[j].name ;
            elOptNew.value = result[j].id;
            if(maxItem<parseInt(elOptNew.value)){
                maxItem=parseInt(elOptNew.value);
            }
            var elSel = document.getElementById(self_ptr_sms.fieldControlBox);
            try {
                elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
            }
            catch(ex) {
                elSel.add(elOptNew); // IE only
            }
    }
	
	if(document.getElementById(fieldControlGloble+'_loading')){
		document.getElementById(fieldControlGloble+'_loading').style.visibility="hidden";
	}
//    var elmnt=document.getElementById(self_ptr_sms.fieldControlBox);
//    for(var i=0; i < elmnt.options.length; i++)
//    {
//      if(parseInt(elmnt.options[i].value) == maxItem){
//         elmnt.selectedIndex = i;
//      }
//    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
PageHelper.prototype.checkDuplicate=function(formFieldId, tableName, tblFieldName, tblPrimaryKey, fieldControl, recordId)
{
	var formFieldValue=document.getElementById(formFieldId).value;
	if(formFieldValue!=""){
   this.fieldControlBox=fieldControl;
   
    document.getElementById(fieldControl).innerHTML="<img src='images/loading1.gif' align='absmiddle' width='14px' height='14px'>";
   
  var params="tableName="+tableName+"&tblFieldName="+tblFieldName+"&formFieldValue="+formFieldValue+"&tblPrimaryKey="+tblPrimaryKey+"&recordId="+recordId;
	
   
    if(window.XMLHttpRequest)
        this.sendsmsvar = new XMLHttpRequest();
    else
        this.sendsmsvar = new ActiveXObject("MSXML2.XMLHTTP");
    var url = "includes/getDuplicateCheck.php";
    this.sendsmsvar.onreadystatechange = this.checkDuplicateCallBack;
    this.sendsmsvar.open( "POST", url,false );
    this.sendsmsvar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    this.sendsmsvar.setRequestHeader("Content-length", params.length);
    this.sendsmsvar.setRequestHeader("Connection", "close");
    self_ptr_sms = this;
    this.sendsmsvar.send(params);
    }else{
    	 document.getElementById(fieldControl).innerHTML="<img src='images/ico-cross.png' align='absmiddle'>";
    }
}
PageHelper.prototype.checkDuplicateCallBack=function()
{
    //alert("jdhjsaashj");
    if(self_ptr_sms)
    {
        var ajaxvar = self_ptr_sms.sendsmsvar;

        //alert(self_ptr_sms);
        if(ajaxvar.readyState == 4)
        {
            if(ajaxvar.status == 200)
            {
                var responsetext = ajaxvar.responseText;

                document.getElementById(self_ptr_sms.fieldControlBox).innerHTML=responsetext;
            }
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
PageHelper.prototype.getStudentFeeDetails=function(course_id, student_id)
{
	if(parseInt(course_id)>0){
			document.getElementById("feeDetailsNoticeMsg").style.display="none";
			document.getElementById("studentFeeDetailsContainer").innerHTML="";
			document.getElementById("feeDetailsLoading").style.display="block";
			
            var params="course_id="+course_id+"&student_id="+student_id;
            if(window.XMLHttpRequest)
                this.sendsmsvar = new XMLHttpRequest();
            else
                this.sendsmsvar = new ActiveXObject("MSXML2.XMLHTTP");
            var url = "includes/getStudentFeeDetails.php";
            this.sendsmsvar.onreadystatechange = this.getTaxByIdCallBack;
            this.sendsmsvar.open( "POST", url,false );
            this.sendsmsvar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            this.sendsmsvar.setRequestHeader("Content-length", params.length);
            this.sendsmsvar.setRequestHeader("Connection", "close");
            self_ptr_sms = this;
            this.sendsmsvar.send(params);
    }else{
        document.getElementById("studentFeeDetailsContainer").innerHTML="";
		document.getElementById("feeDetailsNoticeMsg").style.display="block";
    }
}
PageHelper.prototype.getTaxByIdCallBack=function()
{
    if(self_ptr_sms)
    {
        var ajaxvar = self_ptr_sms.sendsmsvar;

        //alert(self_ptr_sms);
        if(ajaxvar.readyState == 4)
        {
            if(ajaxvar.status == 200)
            {
                var responsetext = jQuery.trim(ajaxvar.responseText);
				document.getElementById("feeDetailsLoading").style.display="none";
                document.getElementById("studentFeeDetailsContainer").innerHTML=responsetext;
            }
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
PageHelper.prototype.getLoginReference=function(user_level_id,login_id)
{
   this.fieldControlBox="reference_id";
   var params="user_level_id="+user_level_id+"&login_id="+login_id;
    if(window.XMLHttpRequest)
        this.sendsmsvar = new XMLHttpRequest();
    else
        this.sendsmsvar = new ActiveXObject("MSXML2.XMLHTTP");
    var url = "includes/getLoginReference.php";
    this.sendsmsvar.onreadystatechange = this.getLoginReferenceCallBack;
    this.sendsmsvar.open( "POST", url,false );
    this.sendsmsvar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    this.sendsmsvar.setRequestHeader("Content-length", params.length);
    this.sendsmsvar.setRequestHeader("Connection", "close");
    self_ptr_sms = this;
    this.sendsmsvar.send(params);
}
PageHelper.prototype.getLoginReferenceCallBack=function()
{
    //alert("jdhjsaashj");
    if(self_ptr_sms)
    {
        var ajaxvar = self_ptr_sms.sendsmsvar;

        //alert(self_ptr_sms);
        if(ajaxvar.readyState == 4)
        {
            if(ajaxvar.status == 200)
            {
                var responsetext = ajaxvar.responseText;

                self_ptr_sms.setLoginReferenceResponse(responsetext);
            }
        }
    }
}
/**
 * Sets the Email response box with the passed message
 * @param textToSet The message which is to be set in the Email response box
 */
PageHelper.prototype.setLoginReferenceResponse=function(textToSet)
{

    var result=JSON && JSON.parse(textToSet) || $.parseJSON(textToSet);
    document.getElementById(self_ptr_sms.fieldControlBox).length = 0;
    var sel=document.getElementById(self_ptr_sms.fieldControlBox);
    var elOptNew = document.createElement('option');
    elOptNew.text = '-Select-' ;
    elOptNew.value = '';
    var elSel = document.getElementById(self_ptr_sms.fieldControlBox);
    try {
        elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
    }
    catch(ex) {
        elSel.add(elOptNew); // IE only
    }
    var maxItem=0;
    for(var j=0;j<result.length;j++){
            var elOptNew = document.createElement('option');
            elOptNew.text = result[j].name ;
            elOptNew.value = result[j].id;
            if(maxItem<parseInt(elOptNew.value)){
                maxItem=parseInt(elOptNew.value);
            }
            var elSel = document.getElementById(self_ptr_sms.fieldControlBox);
            try {
                elSel.add(elOptNew, null); // standards compliant; doesn't work in IE
            }
            catch(ex) {
                elSel.add(elOptNew); // IE only
            }
    }
}
