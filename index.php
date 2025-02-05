<?php




//echo $_SERVER['REMOTE_ADDR']; 



header('Cache-Control: private, no-cache, no-store, must-revalidate, max-age=0');

header('Accept-CH: ' .
    'Sec-CH-UA-Bitness, ' .
    'Sec-CH-UA-Arch, ' .
    'Sec-CH-UA-Full-Version, ' .
    'Sec-CH-UA-Mobile, ' .
    'Sec-CH-UA-Model, ' .
    'Sec-CH-UA-Platform-Version, ' .
    'Sec-CH-UA-Full-Version-List, ' .
    'Sec-CH-UA-Platform, ' .
    'Sec-CH-UA, ' .
    'UA-Bitness, ' .
    'UA-Arch, ' .
    'UA-Full-Version, ' .
    'UA-Mobile, ' .
    'UA-Model, ' .
    'UA-Platform-Version, ' .
    'UA-Platform, ' .
    'UA'
);



$ua = isset($_SERVER['HTTP_SEC_CH_UA']) ? $_SERVER['HTTP_SEC_CH_UA'] : 'no data';
$arch = isset($_SERVER['HTTP_SEC_CH_UA_ARCH']) ? $_SERVER['HTTP_SEC_CH_UA_ARCH'] : 'no data';
$bitness = isset($_SERVER['HTTP_SEC_CH_UA_BITNESS']) ? $_SERVER['HTTP_SEC_CH_UA_BITNESS'] : 'no data';
$fullVersion = isset($_SERVER['HTTP_SEC_CH_UA_FULL_VERSION']) ? $_SERVER['HTTP_SEC_CH_UA_FULL_VERSION'] : 'no data';
$fullVersionList = isset($_SERVER['HTTP_SEC_CH_UA_FULL_VERSION_LIST']) ? $_SERVER['HTTP_SEC_CH_UA_FULL_VERSION_LIST'] : 'no data';
$mobile = isset($_SERVER['HTTP_SEC_CH_UA_MOBILE']) ? ($_SERVER['HTTP_SEC_CH_UA_MOBILE'] === '?1' ? true : false) : 'no data';
// Приведение к строке для вывода
$mobileOutput = is_bool($mobile) ? ($mobile ? 'true' : 'false') : $mobile;
$model = isset($_SERVER['HTTP_SEC_CH_UA_MODEL']) ? $_SERVER['HTTP_SEC_CH_UA_MODEL'] : 'no data';
$platform = isset($_SERVER['HTTP_SEC_CH_UA_PLATFORM']) ? $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] : 'no data';
$platformVersion = isset($_SERVER['HTTP_SEC_CH_UA_PLATFORM_VERSION']) ? $_SERVER['HTTP_SEC_CH_UA_PLATFORM_VERSION'] : 'no data';






// Выводим значения
//echo "Ua: $ua<br>";
//echo "Arch: $arch<br>";
//echo "Bitness: $bitness<br>";
//echo "Full Version: $fullVersion<br>";
//echo "Full Version List: $fullVersionList<br>";
//echo "Mobile: $mobile<br>";
//echo "Model: $model<br>";
//echo "Platform: $platform<br>";
//echo "Platform Version: $platformVersion<br>";




 
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<style>
table {
border-collapse: collapse;
}

table, th, td {
border: 1px solid black;
}

th, td {
padding: 5px;
text-align: left;
}


</style>
	
	
</head>



<body>


<table>

<tr>
<td>Ua</td>
<td><?php echo $ua; ?></td>
</tr>
<tr>
<td>Arch</td>
<td><?php echo $arch; ?></td>
</tr>
<tr>
<td>Bitness</td>
<td><?php echo $bitness; ?></td>
</tr>
<tr>
<td>Full Version</td>
<td><?php echo $fullVersion; ?></td>
</tr>
<tr>
<td>Full Version List</td>
<td><?php echo $fullVersionList; ?></td>
</tr>
<tr>
<td>Mobile</td>
<td><?php echo $mobileOutput; ?></td>
</tr>
<tr>
<td>Model</td>
<td><?php echo $model; ?></td>
</tr>
<tr>
<td>Platform</td>
<td><?php echo $platform; ?></td>
</tr>
<tr>
<td>Platform Version</td>
<td><?php echo $platformVersion; ?></td>
</tr>
</table>


















  
 <div class="ip1">    
<h4><?php echo $_SERVER['REMOTE_ADDR']; ?></h4>          
</div>
  
<h3>HEADERS USER_AGENT = &nbsp; </h3>
<div class="agent1">  
<h4><?php echo $_SERVER['HTTP_USER_AGENT']; ?></h4>
</div>
	



<div id="output1">
    <h4>architecture bitness model platformVersion uaFullVersion fullVersionList</h4>
</div>

<div id="output2"></div>
<br>

<script>
    // Задаем значения для "zw"
    var zw = "architecture bitness model platformVersion uaFullVersion fullVersionList".split(" ");

    // Вызываем метод "getHighEntropyValues" и обрабатываем результат
    navigator.userAgentData.getHighEntropyValues(zw).then(function(values) {
        // Полученные значения можно вывести в элемент с id "output2"
        document.getElementById('output2').innerHTML = JSON.stringify(values, null, 0);

    });
</script>










<table id="outputTable">

</table>

<script>



// Функция для обработки массива
function processArray(array) {
    var arrayString = '';
    for (var i = 0; i < array.length; i++) {
        var item = array[i];
        if (typeof item === 'object') {
            for (var prop in item) {
                if (item.hasOwnProperty(prop)) {
                    arrayString += '"' + prop + '": ' + JSON.stringify(item[prop]) + ', ';
                }
            }
        } else {
            arrayString += JSON.stringify(item);
        }
        if (i < array.length - 1) {
            arrayString += ', ';
        }
    }
    return arrayString;
}




var zw = "architecture bitness model platformVersion uaFullVersion fullVersionList".split(" ");

navigator.userAgentData.getHighEntropyValues(zw).then(function(values) {
    var table = document.getElementById('outputTable');

    // Функция для добавления строки в таблицу
    function addTableRow(property, value) {
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = property;
        cell2.innerHTML = value;
    }

    // Функция для обработки массива
    function processArray(array) {
        var arrayString = '';
        for (var i = 0; i < array.length; i++) {
            var item = array[i];
            if (typeof item === 'object') {
                for (var prop in item) {
                    if (item.hasOwnProperty(prop)) {
                        arrayString += '"' + item[prop] + '"';
                        if (i < array.length - 1 || prop !== 'version') {
                            arrayString += ', ';
                        }
                    }
                }
            } else {
                arrayString += JSON.stringify(item);
            }
        }
        return arrayString;
    }

    // Перебираем свойства и добавляем их в таблицу
    for (var prop in values) {
        if (values.hasOwnProperty(prop)) {
            var propValue = values[prop];

            if (Array.isArray(propValue)) {
                addTableRow(prop, processArray(propValue));
            } else if (typeof propValue === 'object') {
                addTableRow(prop, processObject(propValue));
            } else {
                addTableRow(prop, propValue);
            }
        }
    }

}).catch(function(error) {
    console.log('Error: ' + error);
});








	
</script>
























 </body>
</html>
