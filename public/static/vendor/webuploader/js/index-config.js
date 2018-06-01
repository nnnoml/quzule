now_pick = '';
$(".webuploader_list").click(function(){
    now_pick = $(this).attr('id');
});
$(function(){
        // 优化retina, 在retina下这个值是2
        ratio = window.devicePixelRatio || 1;
        var thumbnailWidth = 110 * ratio;   //缩略图高度和宽度 （单位是像素），当宽高度是0~1的时候，是按照百分比计算，具体可以看api文档
        var thumbnailHeight = 110 * ratio;

        supportTransition = (function(){
            var s = document.createElement('p').style,
                r = 'transition' in s ||
                    'WebkitTransition' in s ||
                    'MozTransition' in s ||
                    'msTransition' in s ||
                    'OTransition' in s;
            s = null;
            return r;
        })();

        isSupportBase64 = ( function() {
            var data = new Image();
            var support = true;
            data.onload = data.onerror = function() {
                if( this.width != 1 || this.height != 1 ) {
                    support = false;
                }
            }
            data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
            return support;
        })();

        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: true,
            //可重复上传
            duplicate :true,
            // swf文件路径
            swf: '/static/vendor/webuploader/Uploader.swf',

            // 文件接收服务端。
            server: '/indexapi/applyUpload',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/jpg,image/jpeg,image/png',
            },
            method:'POST',
            fileNumLimit: 100,
            fileSizeLimit: 50 * 1024 * 1024,    // 50 M
            fileSingleSizeLimit: 5 * 1024 * 1024    // 5 M
        });
        uploader.addButton({id: '#license_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#wenhua_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#xiaofang_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#kuandai_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#zufang_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#mentou_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#neibu_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#xiaofangtongdao_input',innerHTML: '',multiple: false});
        uploader.addButton({id: '#zhengxin_input',innerHTML: '',multiple: false});

        uploader.addButton({id: '#legal_person_card_front',innerHTML: '',multiple: false});
        uploader.addButton({id: '#legal_person_card_back',innerHTML: '',multiple: false});

    // 当有文件添加进来时执行，负责view的创建
    function addFile( file,real_url ) {
        var $li = $( '<li id="' + file.id + '">' +
                '<p class="title">' + file.name + '</p>' +
                '<p class="imgWrap"></p>'+
                '<p class="progress"><span></span></p>' +
                '</li>' );

            $btns = $('<div class="file-panel">' +
                '<span class="cancel" real_url = "'+real_url+'">删除</span></div>').appendTo( $li );
            $wrap = $li.find( 'p.imgWrap' ),

        uploader.makeThumb( file, function( error, src ) {
            var img;
            if ( error ) {
                $wrap.text( '不能预览' );
                return;
            }
            else{
                if(isSupportBase64){
                    img = $('<img src="'+src+'">');
                    $wrap.empty().append( img );
                }
            }
        }, thumbnailWidth, thumbnailHeight );

        $li.on( 'mouseenter', function() {
            $(this).find(".file-panel").stop().animate({height: 30});
        });

        $li.on( 'mouseleave', function() {
            $(this).find(".file-panel").stop().animate({height: 0});
        });

        $btns.on( 'click', 'span', function() {
            var input_val = $("input[name='"+now_pick+"']").val();
            $("input[name='"+now_pick+"']").val(input_val.replace($(this).attr('real_url')+',',''));
            uploader.removeFile( file,true);
            $li.remove();
            return;
        });
        if(now_pick == 'wenhua_input' || now_pick == 'xiaofang_input')
            $("#"+now_pick+"_uploader > ul").html($li);
        else
            $li.appendTo($("#"+now_pick+"_uploader > ul"));
    }

        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            // webuploader事件.当选择文件后，文件被加载到文件队列中，触发该事件。等效于 uploader.onFileueued = function(file){...} ，类似js的事件定义。
            // 创建缩略图
            //单图直接改
            if(now_pick == 'license_input' || now_pick == 'legal_person_card_front' || now_pick == 'legal_person_card_back'){
                uploader.makeThumb( file, function( error, src ) {   //webuploader方法
                    $("#"+now_pick+'_img').attr('src',src)
                }, thumbnailWidth, thumbnailHeight );
            }
            // //多图要编辑
            // else{
            //     addFile( file );
            // }
        });

        // 文件上传成功 回调
        uploader.on( 'uploadSuccess', function( file,response ) {
            if(response.state != 'SUCCESS') return;
            var input_handle = $("input[name='"+now_pick+"']");
            //营业执照，法人照片，文化许可证，消防许可证 唯一
            if(now_pick == 'license_input' || now_pick == 'wenhua_input' || now_pick == 'xiaofang_input' || now_pick == 'legal_person_card_front' || now_pick == 'legal_person_card_back')
                var img_input = '';
            else
                var img_input = input_handle.val();
            if(typeof(img_input) == 'undefined')
                img_input = response.url+',';
            else
                img_input += response.url+',';

            input_handle.val(img_input);
            addFile( file,response.url );
        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                $error = $li.find('div.error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').remove();
        });
    });