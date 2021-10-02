var masterDB={
  'is_ready':'yes',
  'plugin_shortcode':[],
  'media_list':[],
  'media_selected_callback':'',
  'media_upload_status':0,
  'media_path':'',
  'last_dir':'',
};



var pageData={};


Array.prototype.shuffle = function (total) {
  // var a = this.split(""),
  var a = this,
      n = a.length;

  for(var i = n - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var tmp = a[i];
      a[i] = a[j];
      a[j] = tmp;
  }

  return a.join("").substring(0,total);
}

Array.prototype.max = function() {
return Math.max.apply(null, this);
};

Array.prototype.min = function() {
return Math.min.apply(null, this);
};


function bytesToSize(bytes) {
  var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
  if (bytes == 0) return '0 Byte';
  var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
  return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

function getFileName(pathNM)
{
  pathNM=pathNM.split('\\').pop().split('/').pop();

  return pathNM;
}
function genNumber(total)
{
  var text='12345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678912345678956789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789';

  var split=text.split('').shuffle(total);

  return split;
}

function genAlpha(total)
{
  var text='qwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNM';

  var split=text.split('').shuffle(total);

  return split;
}

function genText(total)
{
  var text='qwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNM!@#$%^&*()qwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNM!@#$%^&*()qwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNM!@#$%^&*()qwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNM!@#$%^&*()qwertyuiopasdfghjklzxcvbnmQWERTUIOPASDFGHJKLZXCVBNM!@#$%^&*()';

  var split=text.split('').shuffle(total);

  return split;
}
function system_listen_count_char(theEl,target)
{
  $(target).keyup(function(event) {
    /* Act on the event */

    var theLen=$(this).val().length;

    theEl.text(theLen);

  });
}

function system_count_char(theEl,target)
{
  var theLen=$(target).val().length;

  theEl.text(theLen);
}

function hideModalWidgets()
{
  $('#modalListPluginSupportSetting').modal('hide');
}

function renderPluginShortCode()
{
  $('.row-list-plugin-shortcode-js-widgets').html('');

  var total=masterDB['plugin_shortcode'].length;

  var li='';

  var thumbnail='';
  for (var i = 0; i < total; i++) {

    thumbnail='';
    if(typeof masterDB['plugin_shortcode'][i]['thumbnail']!='undefined' && masterDB['plugin_shortcode'][i]['thumbnail'].length > 5)
    {
      thumbnail='<img src="'+masterDB['plugin_shortcode'][i]['thumbnail']+'" style="display:block;    max-width: 50px;margin: auto;" />';
    }

    li+="<div class='col-lg-3 col-md-3 col-sm-4 col-xs-12 col-select-plugin-shortcode-js shortcode-js-"+masterDB['plugin_shortcode'][i]['code']+" btn btn-info' id='shortcode-js-"+masterDB['plugin_shortcode'][i]['code']+"' data-code='"+masterDB['plugin_shortcode'][i]['code']+"' title='"+masterDB['plugin_shortcode'][i]['title']+"'>"+thumbnail+masterDB['plugin_shortcode'][i]['title']+"</div>";

  }

  $('.row-list-plugin-shortcode-js-widgets').html(li);
}

function refreshMedia()
{
  masterDB['media_list']=[];
}

function showListMedia()
{
  masterDB['media_list']=[];
  get_list_media(function(){
    $('#modalMedia').modal({backdrop:'static',keyboard:false});
  });

}

var selectedMediaEvent = function(arr, callback) {
  arr.push = function(e) {
      Array.prototype.push.call(arr, e);
      callback(arr);
  };
};


function showAlert(title,message)
{

  if(title.length > 2)
  {
      $('.modal-alert-title').html(title);
  }

  $('.modal-alert-content').html(message);

  $('.btnCloseAlert').removeClass('btn-success').removeClass('btn-danger').addClass('btn-danger');
  
  // $('#modalAlert').modal({backdrop:'static',keyboard:false});
  $('#modalAlert').modal('show');

//  setTimeout(function(){ $('#modalAlert').modal('hide'); },2000);
}

function showAlertOK(title,message)
{

    if(title.length > 2)
    {
        $('.modal-alert-title').html(title);
    }

  $('.modal-alert-content').html(message);

  $('.btnCloseAlert').removeClass('btn-success').removeClass('btn-danger').addClass('btn-success');
  
  // $('#modalAlert').modal({backdrop:'static',keyboard:false});
  $('#modalAlert').modal('show');

//  setTimeout(function(){ $('#modalAlert').modal('hide'); },2000);
}

function setIsLoading()
{
    // masterDB['is_ready']='no';
    // is_loading='yes';

    masterDB['is_ready']='no';
}


function hideLoading()
{
    masterDB['is_ready']='yes';
}

setInterval(function(){

  if(masterDB['is_ready']=='no')
  {
    // $('#modalLoading').modal({backdrop:'static',keyboard:false});
    $('#modalLoading').modal('show');
  }
  if(masterDB['is_ready']=='yes')
  {
    $('#modalLoading').modal('hide');
  }

},200);

const isValidIp = value => (/^(?:(?:^|\.)(?:2(?:5[0-5]|[0-4]\d)|1?\d?\d)){4}$/.test(value) ? true : false);

function genSendVar(inputList) {

  if(inputList==null)
  {
      return '';
  }

  var listKey = Object.keys(inputList);

  var li = '';

  // console.log(listKey);

  var total = listKey.length;

  for (var i = 0; i < total; i++) {
      li += listKey[i] + '=' + encodeURIComponent(inputList[listKey[i]]) + '&';
  }

  li = li.substring(0, li.length - 1);

  return li;
}

async function postData(url = '', data = {}) {
  // Default options are marked with *
  setIsLoading();
  var sendData=genSendVar(data);
  const response = await fetch(url, {
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *same-origin, omit
    headers: {
      // 'Content-Type': 'multipart/form-data'
      // 'Content-Type': 'application/json'
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: 'follow', // manual, *follow, error
    // referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: sendData // body data type must match "Content-Type" header
    // body: data // body data type must match "Content-Type" header
  });

  hideLoading();
  return response.json(); // parses JSON response into native JavaScript objects
}

function isFile(url) {
  url = new URL(url);
  return url.pathname.split('/').pop().indexOf('.') > 0;
}

function isDir(pathname) { return !isFile(pathname); }

function md5(d){return rstr2hex(binl2rstr(binl_md5(rstr2binl(d),8*d.length)))}function rstr2hex(d){for(var _,m="0123456789ABCDEF",f="",r=0;r<d.length;r++)_=d.charCodeAt(r),f+=m.charAt(_>>>4&15)+m.charAt(15&_);return f}function rstr2binl(d){for(var _=Array(d.length>>2),m=0;m<_.length;m++)_[m]=0;for(m=0;m<8*d.length;m+=8)_[m>>5]|=(255&d.charCodeAt(m/8))<<m%32;return _}function binl2rstr(d){for(var _="",m=0;m<32*d.length;m+=8)_+=String.fromCharCode(d[m>>5]>>>m%32&255);return _}function binl_md5(d,_){d[_>>5]|=128<<_%32,d[14+(_+64>>>9<<4)]=_;for(var m=1732584193,f=-271733879,r=-1732584194,i=271733878,n=0;n<d.length;n+=16){var h=m,t=f,g=r,e=i;f=md5_ii(f=md5_ii(f=md5_ii(f=md5_ii(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_hh(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_gg(f=md5_ff(f=md5_ff(f=md5_ff(f=md5_ff(f,r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+0],7,-680876936),f,r,d[n+1],12,-389564586),m,f,d[n+2],17,606105819),i,m,d[n+3],22,-1044525330),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+4],7,-176418897),f,r,d[n+5],12,1200080426),m,f,d[n+6],17,-1473231341),i,m,d[n+7],22,-45705983),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+8],7,1770035416),f,r,d[n+9],12,-1958414417),m,f,d[n+10],17,-42063),i,m,d[n+11],22,-1990404162),r=md5_ff(r,i=md5_ff(i,m=md5_ff(m,f,r,i,d[n+12],7,1804603682),f,r,d[n+13],12,-40341101),m,f,d[n+14],17,-1502002290),i,m,d[n+15],22,1236535329),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+1],5,-165796510),f,r,d[n+6],9,-1069501632),m,f,d[n+11],14,643717713),i,m,d[n+0],20,-373897302),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+5],5,-701558691),f,r,d[n+10],9,38016083),m,f,d[n+15],14,-660478335),i,m,d[n+4],20,-405537848),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+9],5,568446438),f,r,d[n+14],9,-1019803690),m,f,d[n+3],14,-187363961),i,m,d[n+8],20,1163531501),r=md5_gg(r,i=md5_gg(i,m=md5_gg(m,f,r,i,d[n+13],5,-1444681467),f,r,d[n+2],9,-51403784),m,f,d[n+7],14,1735328473),i,m,d[n+12],20,-1926607734),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+5],4,-378558),f,r,d[n+8],11,-2022574463),m,f,d[n+11],16,1839030562),i,m,d[n+14],23,-35309556),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+1],4,-1530992060),f,r,d[n+4],11,1272893353),m,f,d[n+7],16,-155497632),i,m,d[n+10],23,-1094730640),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+13],4,681279174),f,r,d[n+0],11,-358537222),m,f,d[n+3],16,-722521979),i,m,d[n+6],23,76029189),r=md5_hh(r,i=md5_hh(i,m=md5_hh(m,f,r,i,d[n+9],4,-640364487),f,r,d[n+12],11,-421815835),m,f,d[n+15],16,530742520),i,m,d[n+2],23,-995338651),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+0],6,-198630844),f,r,d[n+7],10,1126891415),m,f,d[n+14],15,-1416354905),i,m,d[n+5],21,-57434055),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+12],6,1700485571),f,r,d[n+3],10,-1894986606),m,f,d[n+10],15,-1051523),i,m,d[n+1],21,-2054922799),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+8],6,1873313359),f,r,d[n+15],10,-30611744),m,f,d[n+6],15,-1560198380),i,m,d[n+13],21,1309151649),r=md5_ii(r,i=md5_ii(i,m=md5_ii(m,f,r,i,d[n+4],6,-145523070),f,r,d[n+11],10,-1120210379),m,f,d[n+2],15,718787259),i,m,d[n+9],21,-343485551),m=safe_add(m,h),f=safe_add(f,t),r=safe_add(r,g),i=safe_add(i,e)}return Array(m,f,r,i)}function md5_cmn(d,_,m,f,r,i){return safe_add(bit_rol(safe_add(safe_add(_,d),safe_add(f,i)),r),m)}function md5_ff(d,_,m,f,r,i,n){return md5_cmn(_&m|~_&f,d,_,r,i,n)}function md5_gg(d,_,m,f,r,i,n){return md5_cmn(_&f|m&~f,d,_,r,i,n)}function md5_hh(d,_,m,f,r,i,n){return md5_cmn(_^m^f,d,_,r,i,n)}function md5_ii(d,_,m,f,r,i,n){return md5_cmn(m^(_|~f),d,_,r,i,n)}function safe_add(d,_){var m=(65535&d)+(65535&_);return(d>>16)+(_>>16)+(m>>16)<<16|65535&m}function bit_rol(d,_){return d<<_|d>>>32-_}

function base64_decode(data){	
  data=decodeURIComponent(escape(window.atob(data)));
  return data;
}

function base64_encode(data){	
  data = btoa(unescape(encodeURIComponent(data)));  
  return data;
}	

function secondsToHours(d) {
  d = Number(d);
  var h = Math.floor(d / 3600);
  var m = Math.floor(d % 3600 / 60);
  var s = Math.floor(d % 3600 % 60);

  var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
  var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
  var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";

  var result='';

  if(parseFloat(h) > 0)
  {
      result+=h.toString()+'h';
  }

  if(parseFloat(m) > 0)
  {
      result+=m.toString()+'mins';
  }

  return result; 
}
function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function get_list_media(callback)
{
  $('.list-media').html('');

  postData(API_URL+'get_list_media', {'do':'get','type':'1','path':masterDB['media_path']}).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    var total=data['data'].length;

    var li='';

    var url='';
    var fileHash='';

    var thatFile=false;

    var attr_isfile='dir';
    for (var i = 0; i < total; i++) {

      url=SITE_URL+'public/uploads/medias/'+data['data'][i];

      fileHash=base64_encode('public/uploads/medias/'+masterDB['media_path']+data['data'][i]);

      if(data['data'][i].length < 2)
      {
        continue;
      }

      thatFile=false;

      attr_isfile='dir';
      if(isFile(url)==true)
      {
        thatFile=true;

        attr_isfile='file';
      }

      li+='<tr class="'+md5(fileHash)+'" style="background-color:#fff;border:1px solid #dfdfdf;">';
        li+='<td style="border:1px solid #dfdfdf;width: 70px;    vertical-align: middle;">';
        
        if(thatFile==true)
        {
          li+='<button class="btn btn-info btn-sm btn-select-media" data-is-file="'+attr_isfile+'" data-url="'+url+'" data-name="'+data['data'][i]+'" type="button"><i class="fas fa-minus"></i></button>';
        }
        else
        {
          li+='<button class="btn btn-info btn-sm " data-is-file="'+attr_isfile+'" data-url="'+url+'" data-name="'+data['data'][i]+'" type="button"><i class="fas fa-minus"></i></button>';
        }

        li+='</td>';
        
        if(thatFile==true)
        {
          li+='<td style="border:1px solid #dfdfdf; vertical-align: middle;" ><i class="fas fa-file" style="color: #000;font-size:18pt"></i> <span style="font-size:15pt">'+data['data'][i]+'</span></td>';

        }
        else
        {
          li+='<td style="border:1px solid #dfdfdf;    vertical-align: middle;cursor:pointer;" class="click-show-dir" data-target="'+data['data'][i]+'"><i class="fas fa-folder" style="color: #F69F22;font-size:18pt"></i> <span style="font-size:15pt">'+data['data'][i]+'</span></td>';
        }

        // li+='<td style="border:1px solid #dfdfdf;width: 110px;    vertical-align: middle;">Size</td>';
        li+='<td style="border:1px solid #dfdfdf;    vertical-align: middle;">';
          
          if(thatFile==true)
          {
            li+='<a class="btn btn-info btn-sm btn-select-all" href="'+SITE_URL+'api/download_media?hash='+fileHash+'" data-name="'+data['data'][i]+'"><i class="fas fa-file-download"></i></a>&nbsp;';
            li+='<a class="btn btn-info btn-sm btn-select-all" href="'+url+'" target="_blank" data-name="'+data['data'][i]+'" ><i class="fas fa-link"></i></a>&nbsp;';

          }
          
          li+='<button class="btn btn-info btn-sm btn-delete-media" data-hash="'+fileHash+'" data-name="'+data['data'][i]+'" type="button"><i class="fas fa-trash-alt"></i></button>&nbsp;';
        li+='</td>';
      li+='</tr>';      
    }

    $('.list-media').html(li);
  
    callback();
  });      
}


$(document).on('click','.btn-delete-media',function(){

  masterDB['delete_hash']='';
  var sendData={};
  var theHash=$(this).attr('data-hash');

  sendData['hash']=theHash;
  sendData['type']='1';
  sendData['path']=masterDB['media_path'];

  masterDB['delete_hash']=md5(theHash);

  postData(API_URL+'delete_media', sendData).then(data => {
      $('.'+masterDB['delete_hash']).remove();
      get_list_media(function(){});
  });  
});



setInterval(function(){
  selectedMediaEvent(masterDB['media_list'],function(){
    console.log('Media selected...');

    // var total=masterDB['media_list'].length;
    // masterDB['media_selected_callback'](masterDB['media_list'][total-1]);
  });
}, 100);

$(document).on('click','.btn-create-shortcode',function(){
  renderPluginShortCode();
  $('#modalListPluginSupportSetting').modal({backdrop:'static',keyboard:false});
});

$(document).on('click','.click-show-dir',function(){
  var target=$(this).attr('data-target').trim();

  if(target=='..')
  {
      var splitDir=masterDB['media_path'].split('/');

      var total=splitDir.length;

      console.log(splitDir[total-2]);
      masterDB['media_path']=masterDB['media_path'].replace(splitDir[total-2],'');

  }
  else
  {
    masterDB['media_path']=masterDB['media_path']+target+'/';

    masterDB['last_dir']=target;
  }

  masterDB['media_path']=masterDB['media_path'].replace('//','/');

  showListMedia();
});


function dataURIToBlob(dataURI) {
  dataURI = dataURI.replace(/^data:/, '');

  const type = dataURI.match(/image\/[^;]+/);
  const base64 = dataURI.replace(/^[^,]+,/, '');
  const arrayBuffer = new ArrayBuffer(base64.length);
  const typedArray = new Uint8Array(arrayBuffer);

  for (let i = 0; i < base64.length; i++) {
      typedArray[i] = base64.charCodeAt(i);
  }

  return new Blob([arrayBuffer], {type});
}

function b64toBlob(dataURI) {

  var byteString = atob(dataURI.split(',')[1]);
  var ab = new ArrayBuffer(byteString.length);
  var ia = new Uint8Array(ab);

  for (var i = 0; i < byteString.length; i++) {
      ia[i] = byteString.charCodeAt(i);
  }
  return new Blob([ab], { type: 'image/jpeg' });
}

function base64toBlob(data, type) {
	const bytes = atob(data);
	let length = bytes.length;
	let out = new Uint8Array(length);

	// Loop and convert.
	while (length--) {
		out[length] = bytes.charCodeAt(length);
	}

	return new Blob([out], { type: type });
};

function strip_utf8(alias) {
  var str = alias;
  str = str.toLowerCase();
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
  str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
  str = str.replace(/đ/g,"d");
  str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
  str = str.replace(/ + /g," ");
  str = str.trim(); 
  return str;
}




function prepareMediaUpload()
{
  // var fileUpload = $(".fileMedias").get(0);  
  var fileUpload = '';  
  var total=$(".fileMedias").length;

  for (let i = 0; i < total; i++) {
    if($(".fileMedias").get(i).files.length > 0)
    {
      fileUpload=$(".fileMedias").get(i);
      break;
    }
    
  }
  
  var files = fileUpload.files;  
      
  // Create FormData object  
  var fileData = new FormData();  

  // Looping over all files and add it to FormData object  
  for (var i = 0; i < files.length; i++) {  
    // console.log(files[i]);
      fileData.append('medias[]', files[i]);  
  }  

  fileData.append('type', 1); 
  fileData.append('path', masterDB['media_path']); 

  masterDB['media_upload_status']=0;

  // console.log(fileData);

  $.ajax({  
    url: SITE_URL+'api/upload_media',  
    // url: site_url+'api.aspx/uploadFileAnh',  
    type: "POST",  
    contentType: false, // Not to set any content header  
    processData: false, // Not to process data  
    data: fileData,  cache:false,
    success: function (result) {  
        hideLoading();

        // console.log(JSON.parse(result));
        masterDB['media_upload_status']=1;

        var dataJSON=JSON.parse(result);

        var total=dataJSON.length;

        for (var i = 0; i < total; i++) {
          masterDB['media_list'].push(dataJSON[i]);
        }


        get_list_media(function(){

          masterDB['media_upload_status']=2;
        });

        // console.log(result);

    },  
    error: function (err) {  
        hideLoading();
        // showAlert('',err.statusText);
        
        // alert(err.statusText);  
    }  
  });    
  // return response.json();  
}

$(document).ready(function() {

  $('.system_count_char').each(function(index, el) {

  var theEl=$(this);

  var target=$(this).data('target');

  system_count_char(theEl,target);
  
  system_listen_count_char(theEl,target);

  });

});
    
$(document).on("change", ".fileMedias", function () {
  prepareMediaUpload();

});


// $(document).on("click", ".btn-select-media", function () {
//   var isFile=$(this).attr('data-is-file');

//   masterDB['media_upload_status']=0;

//   if(isFile=='file')
//   {
//     var theUrl=$(this).attr('data-url');

//     if(theUrl.length > 10)
//     {
//       console.log(theUrl);
//       masterDB['media_upload_status']=2;

//       masterDB['media_list']=[];

//       masterDB['media_list'].push(theUrl);

//       // masterDB['media_upload_status']=0;
//     }
//   }

// });
