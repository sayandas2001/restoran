function chk_qp_frm_validate()
{
	//console.log($("input[name='version']:checked").val());
	var allok=1;
	$("#option_err").hide();
	if($.trim($("#question").val())=="")
	{
		$("#question_err").show();
		$("#question").addClass('error_input');
		allok=0;
	}else{
		$("#question_err").hide();
		$("#question").removeClass('error_input');
	}
	if($.trim($("input[name='version']:checked").val())=="undefined" || $.trim($("input[name='version']:checked").val())=="")
	{
		$("#radio_err").show();
		$("input[name='version']:checked").addClass('error_input');
		allok=0;
	}else{
		$("#radio_err").hide();
		$("input[name='version']:checked").removeClass('error_input');
	}
	var tot_option=parseInt($("#tot_option").val());
	for(var i=1; i<=tot_option; i++)
	{
		if(getValue("option"+i)=='')
		{
			$("#option_err").show();
			allok=0;
		}
	}
	if(allok==1)
	{
		return true;
	}else{
		return false;
	}
}
function tdselected(secid,tdindex)
{
	for(var i=0; i<=5; i++)
	{
		var tdid='t'+secid+i;
		$("#"+tdid ).removeClass( "selected" );
	}
	var tdid='t'+secid+tdindex;
	$("#"+tdid ).addClass( "selected" );
	$("#point"+secid).val(tdindex);
}
function add_another_option()
{
	var tot_option=parseInt($("#tot_option").val());
	var authDiv = document.getElementById('option_main_div');
	var is_delete=0;
	if(tot_option>=2)
	{
		var is_delete=1;
	}
	var pHtml='';
	var j=1;
	for(var i=1; i<=tot_option; i++)
	{
		pHtml +='<div style="border-bottom:1px solid #cccccc; margin-top:16px;" id="sq'+i+'">';
		pHtml +='<div class="input-group mb-3">';
		pHtml +='<input class="form-control" type="text" name="option'+i+'" id="option'+i+'" value="'+getValue("option"+i)+'" placeholder="Enter a possible answer">';
		if(is_delete==1)
		{
			pHtml +='<div class="input-group-append" style="background-color:#FFFFFF; border:none;">';
			pHtml +='<span class="input-group-text"  style="background-color:#FFFFFF; border:none;cursor:pointer;" onclick="delete_block('+i+')";><i class="fa fa-trash" aria-hidden="true"></i></span>';
			pHtml +='</div>';
		}
		pHtml +='</div>';
		pHtml +='<div class="form-group">';
		pHtml +='<div class="single-table">';
		pHtml +='<div class="table-responsive">';
		pHtml +='<table class="table table-bordered text-center option-td-color">';
		pHtml +='<tbody>';
		pHtml +='<tr>';
		var point=parseInt(getValue("point"+i));
		var tdcls0='',tdcls1='',tdcls2='',tdcls3='',tdcls4='',tdcls5='';
		if(point==0)
		{
			tdcls0="selected";
		}
		if(point==1)
		{
			tdcls1="selected";
		}
		if(point==2)
		{
			tdcls2="selected";
		}
		if(point==3)
		{
			tdcls3="selected";
		}
		if(point==4)
		{
			tdcls4="selected";
		}
		if(point==5)
		{
			tdcls5="selected";
		}
		//alert(point);
		//alert(tdcls0);
		pHtml +='<td class="'+tdcls0+'" id="t'+i+'0" onclick="tdselected('+i+',0);">0</td>';
		pHtml +='<td class="'+tdcls1+'" id="t'+i+'1" onclick="tdselected('+i+',1);">1</td>';
		pHtml +='<td class="'+tdcls2+'" id="t'+i+'2" onclick="tdselected('+i+',2);">2</td>';
		pHtml +='<td class="'+tdcls3+'" id="t'+i+'3" onclick="tdselected('+i+',3);">3</td>';
		pHtml +='<td class="'+tdcls4+'" id="t'+i+'4" onclick="tdselected('+i+',4);">4</td>';
		pHtml +='<td class="'+tdcls5+'" id="t'+i+'5" onclick="tdselected('+i+',5);">5</td>';
		pHtml +='</tr>';
		pHtml +='<input type="hidden" name="point'+i+'" id="point'+i+'" value="'+point+'">';
		pHtml +='<input type="hidden" name="opid'+i+'" id="opid'+i+'" value="'+getValue("opid"+i)+'">';
		pHtml +='</tbody>';
		pHtml +='</table>';
		pHtml +='</div></div></div></div>';
		j++;
	}
	
	pHtml +='<div style="border-bottom:1px solid #cccccc; margin-top:16px;" id="sq'+j+'">';
	pHtml +='<div class="input-group mb-3">';
	pHtml +='<input class="form-control" type="text" name="option'+j+'" id="option'+j+'" value="" placeholder="Enter a possible answer">';
	if(is_delete==1)
	{
		pHtml +='<div class="input-group-append" style="background-color:#FFFFFF; border:none;">';
		pHtml +='<span class="input-group-text"  style="background-color:#FFFFFF; border:none;;cursor:pointer;" onclick="delete_block('+j+')";><i class="fa fa-trash" aria-hidden="true"></i></span>';
		pHtml +='</div>';
	}
	pHtml +='</div>';
	pHtml +='<div class="form-group">';
	pHtml +='<div class="single-table">';
	pHtml +='<div class="table-responsive">';
	pHtml +='<table class="table table-bordered text-center option-td-color">';
	pHtml +='<tbody>';
	pHtml +='<tr>';
	var point=0;
	var tdcls0='',tdcls1='',tdcls2='',tdcls3='',tdcls4='',tdcls5='';
	if(point==0)
	{
		tdcls0="selected";
	}
	if(point==1)
	{
		tdcls1="selected";
	}
	if(point==2)
	{
		tdcls2="selected";
	}
	if(point==3)
	{
		tdcls3="selected";
	}
	if(point==4)
	{
		tdcls4="selected";
	}
	if(point==5)
	{
		tdcls5="selected";
	}
	pHtml +='<td class="'+tdcls0+'" id="t'+j+'0" onclick="tdselected('+j+',0);">0</td>';
	pHtml +='<td class="'+tdcls1+'" id="t'+j+'1" onclick="tdselected('+j+',1);">1</td>';
	pHtml +='<td class="'+tdcls2+'" id="t'+j+'2" onclick="tdselected('+j+',2);">2</td>';
	pHtml +='<td class="'+tdcls3+'" id="t'+j+'3" onclick="tdselected('+j+',3);">3</td>';
	pHtml +='<td class="'+tdcls4+'" id="t'+j+'4" onclick="tdselected('+j+',4);">4</td>';
	pHtml +='<td class="'+tdcls5+'" id="t'+j+'5" onclick="tdselected('+j+',5);">5</td>';
	pHtml +='</tr>';
	pHtml +='<input type="hidden" name="point'+j+'" id="point'+j+'" value="'+point+'">';
	pHtml +='<input type="hidden" name="opid'+j+'" id="opid'+j+'" value="0">';
	pHtml +='</tbody>';
	pHtml +='</table>';
	pHtml +='</div></div></div></div>';
	
	document.getElementById('tot_option').value=j;
	
	authDiv.innerHTML=pHtml;
}

function delete_block(di)
{
	var tot_option=parseInt($("#tot_option").val());
	var authDiv = document.getElementById('option_main_div');
	swal({
		title: "Delete",
		text: "Are you sure want to delete it?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: 'btn-warning',
		confirmButtonText: 'Yes, delete it!',
		closeOnConfirm: true,
		closeOnCancel: true
	},
	function(){
		var is_delete=0;
		var tot_option_d=tot_option-1;
		if(tot_option_d>2)
		{
			var is_delete=1;
		}
		var pHtml='';
		var j=0;
		for(var i=1; i<=tot_option; i++)
		{
			if (i == di) continue;
			
			j++;
			pHtml +='<div style="border-bottom:1px solid #cccccc; margin-top:16px;" id="sq'+j+'">';
			pHtml +='<div class="input-group mb-3">';
			pHtml +='<input class="form-control" type="text" name="option'+j+'" id="option'+j+'" value="'+getValue("option"+i)+'" placeholder="Enter a possible answer">';
			if(is_delete==1)
			{
				pHtml +='<div class="input-group-append" style="background-color:#FFFFFF; border:none;">';
				pHtml +='<span class="input-group-text"  style="background-color:#FFFFFF; border:none;cursor:pointer;" onclick="delete_block('+j+')";><i class="fa fa-trash" aria-hidden="true"></i></span>';
				pHtml +='</div>';
			}
			pHtml +='</div>';
			pHtml +='<div class="form-group">';
			pHtml +='<div class="single-table">';
			pHtml +='<div class="table-responsive">';
			pHtml +='<table class="table table-bordered text-center option-td-color">';
			pHtml +='<tbody>';
			pHtml +='<tr>';
			var point=parseInt(getValue("point"+i));
			var tdcls0='',tdcls1='',tdcls2='',tdcls3='',tdcls4='',tdcls5='';
			if(point==0)
			{
				tdcls0="selected";
			}
			if(point==1)
			{
				tdcls1="selected";
			}
			if(point==2)
			{
				tdcls2="selected";
			}
			if(point==3)
			{
				tdcls3="selected";
			}
			if(point==4)
			{
				tdcls4="selected";
			}
			if(point==5)
			{
				tdcls5="selected";
			}
			//alert(point);
			//alert(tdcls0);
			pHtml +='<td class="'+tdcls0+'" id="t'+j+'0" onclick="tdselected('+j+',0);">0</td>';
			pHtml +='<td class="'+tdcls1+'" id="t'+j+'1" onclick="tdselected('+j+',1);">1</td>';
			pHtml +='<td class="'+tdcls2+'" id="t'+j+'2" onclick="tdselected('+j+',2);">2</td>';
			pHtml +='<td class="'+tdcls3+'" id="t'+j+'3" onclick="tdselected('+j+',3);">3</td>';
			pHtml +='<td class="'+tdcls4+'" id="t'+j+'4" onclick="tdselected('+j+',4);">4</td>';
			pHtml +='<td class="'+tdcls5+'" id="t'+j+'5" onclick="tdselected('+j+',5);">5</td>';
			pHtml +='</tr>';
			pHtml +='<input type="hidden" name="point'+j+'" id="point'+j+'" value="'+point+'">';
			pHtml +='<input type="hidden" name="opid'+j+'" id="opid'+j+'" value="'+getValue("opid"+i)+'">';
			pHtml +='</tbody>';
			pHtml +='</table>';
			pHtml +='</div></div></div></div>';
		}
		
		document.getElementById('tot_option').value=j;
		
		authDiv.innerHTML=pHtml;
	});
	$(".pulseWarning").hide();
}

function getValue(id)
{
	if (document.getElementById(id))
	{
		return $.trim($("#"+id).val());
	}
	else return '';
}