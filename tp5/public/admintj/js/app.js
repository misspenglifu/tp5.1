/**
 * Created by Administrator on 2018/9/26 0026.
 */
//地图容器
var chart = echarts.init(document.getElementById('main'));
//34个省、市、自治区的名字拼音映射数组
var provinces = {
    //23个省
    "台湾": "taiwan",
    "河北": "hebei",
    "山西": "shanxi",
    "辽宁": "liaoning",
    "吉林": "jilin",
    "黑龙江": "heilongjiang",
    "江苏": "jiangsu",
    "浙江": "zhejiang",
    "安徽": "anhui",
    "福建": "fujian",
    "江西": "jiangxi",
    "山东": "shandong",
    "河南": "henan",
    "湖北": "hubei",
    "湖南": "hunan",
    "广东": "guangdong",
    "海南": "hainan",
    "四川": "sichuan",
    "贵州": "guizhou",
    "云南": "yunnan",
    "陕西": "shanxi1",
    "甘肃": "gansu",
    "青海": "qinghai",
    //5个自治区
    "新疆": "xinjiang",
    "广西": "guangxi",
    "内蒙古": "neimenggu",
    "宁夏": "ningxia",
    "西藏": "xizang",
    //4个直辖市
    "北京": "beijing",
    "天津": "tianjin",
    "上海": "shanghai",
    "重庆": "chongqing",
    //2个特别行政区
    "香港": "xianggang",
    "澳门": "aomen"
};

//直辖市和特别行政区-只有二级地图，没有三级地图
var special = ["北京","天津","上海","重庆","香港","澳门"];
var mapdata = [];
//绘制全国地图
$.getJSON('http://www.penglifu.com/admintj/js/china.json', function(data){
    d = [];
    for( var i=0;i<data.features.length;i++ ){
        d.push({
            name:data.features[i].properties.name
        })
    }
    mapdata = d;
    //注册地图
    echarts.registerMap('china', data);
    //绘制地图
    renderMap('china',d);

});

//地图点击事件
chart.on('click', function (params) {
    // var dalineixin=$('.dalileixing').val();
    var dalineixin=1059;
    if(dalineixin==1057){
        var chenghsi=$('#main').children().last().children('i').html();
        $('.shengshi').val(chenghsi);
        var str=$('#main').children().last().children('i').html();
        document.getElementById('wrong-message').innerHTML = str;
        $(".fix").fadeIn(200);
        $(".zc_buy_info_box").fadeIn(200);
        $('html,body').addClass('ovfHiden'); //使网页不可滚动
    }else if(dalineixin==1058){
        if( params.name in provinces ){
            //如果点击的是34个省、市、自治区，绘制选中地区的二级地图
            $.getJSON('http://www.penglifu.com/admintj/map/province/'+ provinces[params.name] +'.json', function(data){
                echarts.registerMap( params.name, data);
                var d = [];
                for( var i=0;i<data.features.length;i++ ){
                    d.push({
                        name:data.features[i].properties.name
                    })
                }
                renderMap(params.name,d);
            });
        }else{
            var chenghsi=$('#main').children().last().children('i').html();
            $('.shengshi').val(chenghsi);
            var str=$('#main').children().last().children('i').html();
            document.getElementById('wrong-message').innerHTML = str;
            $(".fix").fadeIn(200);
            $(".zc_buy_info_box").fadeIn(200);
            $('html,body').addClass('ovfHiden'); //使网页不可滚动
        }
    }else if(dalineixin==1059){
        if( params.name in provinces ){
            //如果点击的是34个省、市、自治区，绘制选中地区的二级地图
            $.getJSON('http://www.penglifu.com/admintj/map/province/'+ provinces[params.name] +'.json', function(data){
                echarts.registerMap( params.name, data);
                var d = [];
                for( var i=0;i<data.features.length;i++ ){
                    d.push({
                        name:data.features[i].properties.name
                    })
                }
                renderMap(params.name,d);
            });
        }else if( params.seriesName in provinces ){

            //如果是【直辖市/特别行政区】只有二级下钻
            if(  special.indexOf( params.seriesName ) >=0  ){
                renderMap('china',mapdata);
            }else{
                //显示县级地图
                $.getJSON('http://www.penglifu.com/admintj/map/city/'+ cityMap[params.name] +'.json', function(data){
                    echarts.registerMap( params.name, data);
                    var d = [];
                    for( var i=0;i<data.features.length;i++ ){
                        d.push({
                            name:data.features[i].properties.name
                        })
                    }
                    renderMap(params.name,d);
                });
            }
        }else{
            var chenghsi=$('#main').children().last().children('i').html();
            $('.shengshi').val(chenghsi);
            var str=$('#main').children().last().children('i').html();
            document.getElementById('wrong-message').innerHTML = str;
            $(".fix").fadeIn(200);
            $(".zc_buy_info_box").fadeIn(200);
            $('html,body').addClass('ovfHiden'); //使网页不可滚动
        }
    }
});

//初始化绘制全国地图配置
var option = {
    backgroundColor: '#fff',
    title : {
        text: '中国',
        subtext: '三级下钻',
        link:'http://www.ldsun.com',
        left: 'center',
        textStyle:{
            color: '#333',
            fontSize:16,
            fontWeight:'normal',
            fontFamily:"Microsoft YaHei"
        },
        subtextStyle:{
            color: '#ccc',
            fontSize:13,
            fontWeight:'normal',
            fontFamily:"Microsoft YaHei"
        }
    },
    tooltip: {
        trigger: 'item',
        formatter: '{b}'
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            dataView: {readOnly: false},
            restore: {},
            saveAsImage: {}
        },
        iconStyle:{
            normal:{
                color:'#fff'
            }
        }
    },
    animationDuration:1000,
    animationEasing:'cubicOut',
    animationDurationUpdate:1000

};
function renderMap(map,data){

    option.title.subtext = map;
    option.series = [
        {
            name: map,
            type: 'map',
            mapType: map,
            roam: false,
            nameMap:{
                'china':'中国'
            },
            label: {
                normal:{
                    show:true,
                    textStyle:{
                        color:'#0078fe',
                        fontSize:13
                    }
                },
                emphasis: {
                    show: true,
                    textStyle:{
                        color:'#fff',
                        fontSize:13
                    }
                }
            },
            itemStyle: {
                normal: {
                    areaColor: '#b3b3b3',
                    borderColor: 'dodgerblue'
                },
                emphasis: {
                    areaColor: '#ec4545'
                }
            },
            data:data
        }
    ];
    //渲染地图
    chart.setOption(option);
    var zongchouproduct_id=$('.area').val();
    var myData=[];
    var myTemp;
    var areas=[];
    var area;
    $.ajax({
        type:'POST',
        data: {zongchouproduct_id:zongchouproduct_id},
        url: 'welcome',
        dataType:'json',
        success: function(result){
            $('.area').val(2);
            for(var i=0;i<result.length;i++){
                myTemp={name:result[i],selected:true,value:i};
                myData.push(myTemp);
            }
            for(var i=0;i<result.length;i++){
                area={area:result[i]};
                areas.push(area);
            }
            chart.setOption({
                tooltip : {
                    trigger: 'item',
                    formatter:function (params,ticket,callback){
                        var pna = params.name;
                        var res = '';
                        for(var i = 0;i<areas.length;i++){
                            if(areas[i].area == pna){
                                res ='你在'+'<i>'+areas[i].area+'</i>';//设置自定义数据的模板，这里的模板是图片
                                break;
                            }else{
                                res ='<i>'+pna+'</i>';//设置自定义数据的模板，这里的模板是图片
                            }
                        }
                        setTimeout(function (){
                            // 仅为了模拟异步回调
                            callback(ticket, res);//回调函数，这里可以做异步请求加载的一些代码
                        }, 1);
                        return 'loading';
                    }
                },
                series: [{
                    data:myData
                }]
            });
        }
    })

}

//Click to change the map















