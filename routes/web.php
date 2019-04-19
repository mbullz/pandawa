<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/taco', function() {
	$numbers = "08170528118, 085781200950, 08563445112, 0818828033, 08113111657, 081932238884, 082191366049, 08170886688, 081260999289, 08122555244, 081248889789, 081261715876, 081290494726, 081284246396, 081336834367, 081380217310, 081807232527, 081908831593, 081911150457, 081990998838, 082167531525, 082250002852, 085241832517, 087785451206, 087786381585, 087831113175, 087834768647, 089655114906, 08989071925, 0895330304701, 081381030045, 0811113003, 0811132589, 0811166150, 0811234875, 0811257152, 0811327372, 0811330505, 0811360230, 0811409139, 0811714040, 0811730024, 0811813770, 0811844978, 0811850830, 0811853229, 0811862382, 0811904770, 0811926148, 0811932032, 0811940978, 0811976644, 0811978710, 0811981105, 0816652883, 0816666197, 0816668614, 0816681176, 0816766347, 0816885999, 0817171798, 0817187474, 0817214810, 0817220124, 0817225593, 0817261722, 0817297230, 0817298333, 0817308651, 0817621216, 0817774889, 0817781030, 0817814163, 0817817608, 0817828833, 0817899698, 0818111115, 0818183218, 0818208255, 0818221159, 0818225677, 0818246500, 0818269050, 0818478226, 0818500847, 0818743400, 0818746244, 0818856993, 0818904419, 0818956956, 0818973171, 0819715715, 0819807110, 0819816905, 02145854588, 02147862611, 02157957029, 02158305597, 08111186808, 08111288821, 08111516168, 08111738988, 08111777425, 08111997006, 08112198168, 08112240030, 08112272345, 08112340110, 08112347819, 08112987888, 08113002344, 08113308120, 08113568569, 08113610522, 08113693800, 08115395309, 08115770716, 08116029547, 08116201888, 08117878129, 08118090190, 08118090900, 08118444444, 08118790029, 08119218383, 08119222315, 08119771546, 08119849357, 08119866126, 08119950250, 08121073188, 08121642417, 08121884194, 08122077159, 08122188852, 08122206427, 08122229163, 08122353452, 08122524153, 08122537453, 08122565566, 08122596503, 08122788314, 08122820524, 08122850664, 08122884448, 08123006441, 08123036322, 08123148530, 08123292932, 08123295859, 08123300745, 08124152168, 08125646478, 08126363018, 08127558052, 08127814050, 08128032930, 08128285039, 08128329852, 08128329852, 08128519090, 08128646304, 08128975887, 08129039512, 08129262301, 08129424560, 08129595395, 08129618688, 08129622120, 08129951915, 08129993748, 08138444188, 08151676099, 08155521983, 08155557078, 08156118367, 08156549176, 08157620903, 08157900093, 08157954446, 08158306598, 08158336780, 08158828228, 08158880224, 08158972828, 08159008679, 08159312699, 08161128838, 08161145627, 08161155647, 08161402629, 08161631538, 08161821568, 08161893919, 08161899910, 08161926550, 08161953388, 08161956795, 08170122225, 08170177099, 08170599033, 08170756722, 08170818954, 08170858058, 08172361690, 08172383688, 08174920930, 08175073504, 08175262673, 08176021314, 08176067878, 08176067878, 08176440281, 08176542033, 08176643217, 08176749671, 08179002828, 08179192017, 08179333167, 08179412707, 08179412707, 08179864958, 08179952069, 08179952969, 08179986800, 08196011711, 08197975173, 08212683548, 08558382252, 08561108984, 08561220275, 08561879228, 08562314823, 08562602285, 08567267068, 08567481916, 08567656070, 08567683128, 08568010042, 08763172371, 08777815263, 08873446944, 08883456777, 08886506688, 08888415217, 08973505080, 08982525758, 08985643580, 08986428738, 08990843309, 08992384329, 08992554522, 08993177110, 08994141666, 08994921026, 08995357919, 08996822201, 08998048623, 08998877333, 08999205383, 058945000699, 061430599898, 081210217705, 081210472057, 081210728028, 081210849137, 081210921920, 081212004375, 081212082836, 081212122796, 081212182025, 081212262080, 081212289909, 081212339393, 081212374334, 081212592592, 081212600231, 081212706969, 081212788005, 081212828009, 081213326000, 081213813747, 081214524817, 081215204284, 081215970448, 081216139111, 081216183344, 081216301102, 081216533147, 081217203122, 081217238218, 081217672998, 081218248377, 081218450973, 081218571376, 081218886050, 081219146282, 081219443581, 081219681748, 081219755567, 081220000070, 081220058588, 081220729124, 081221464646, 081222219723, 081222301201, 081222730777, 081222739380, 081223338938, 081223498793, 081223606981, 081224298228, 081224541275, 081225123200, 081226233005, 081226418055, 081226418055, 081227237570, 081228138171, 081228569698, 081229575999, 081229816677, 081229990909, 081230709900, 081232108606, 081232400263, 081232409991, 081232819090, 081233057179, 081233057179, 081233977722, 081234459393, 081234572842, 081234878338, 081235406568, 081235406568, 081235434007, 081235606307, 081236015939, 081236421238, 081236875880, 081237386637, 081238889990, 081242101313, 081242520530, 081249988788, 081251155781, 081251853853, 081252277359, 081252554556, 081252933336, 081254456706, 081256391884, 081259678866, 081259719340, 081259738988, 081261915916, 081266384366, 081266613371, 081271650030, 081274503111, 081280118687, 081280141800, 081280259977, 081280342574, 081280361996, 081280398000, 081280599751, 081281699746, 081281703029, 081281784187, 081282218332, 081282307663, 081282798637, 081282810083, 081283049104, 081283185584, 081283367112, 081283899550, 081284246396, 081284246396, 081284477512, 081284631304, 081285751990, 081285808052, 081286128368, 081286275935, 081286558972, 081286609407, 081286975235, 081287331155, 081287551212, 081287606020, 081287844465, 081287866616, 081287882600, 081288167001, 081288324191, 081288412885, 081288430773, 081288590700, 081288652799, 081288999918, 081289110006, 081289115402, 081289193111, 081289296788, 081289333143, 081289346438, 081289441899, 081289548023, 081289560511, 081289639915, 081289808908, 081289892889, 081289982224, 081290313143, 081290591980, 081291132927, 081291364441, 081291602615, 081291881931, 081293209336, 081293348563, 081293773988, 081293773988, 081293920411, 081294038759, 081294095388, 081294103889, 081295121233, 081295913738, 081296071212, 081297034318, 081298148098, 081298153889, 081298295522, 081298346152, 081298363388, 081299029987, 081299086990, 081299099066, 081299333041, 081310092100, 081310219807, 081310255587, 081310289000, 081310310916, 081310505141, 081310606639, 081310920366, 081310920366, 081310921679, 081311009991, 081311016239, 081311117555, 081311195255, 081311328246, 081311401435, 081311451130, 081311603422, 081313117955, 081314111881, 081314358000, 081314509993, 081314559245, 081314602678, 081314822333, 081314955712, 081314955712, 081315000774, 081315009855, 081315253986, 081315397377, 081315842985, 081316053603, 081316062757, 081316099101, 081316666748, 081317002603, 081317195550, 081317625752, 081317724084, 081317895532, 081318029578, 081318125884, 081318251090, 081318287808, 081318846131, 081318922803, 081319294666, 081319329006, 081319329006, 081319358040, 081319398602, 081319417650, 081319938514, 081319999915, 081320366029, 081320527775, 081320715595, 081321001300, 081321100288, 081321521733, 081321906415, 081321917777, 081322202277, 081322299011, 081322322537, 081322551031, 081322868111, 081324208208, 081324505899, 081325289030, 081325521959, 081325675594, 081325892250, 081326000899, 081326000899, 081326190441, 081326659202, 081326855747, 081327384343, 081327549922, 081327619056, 081327631083, 081328343338, 081328821223, 081328981933, 081329889906, 081330020778, 081330259292, 081330409112, 081330823030, 081331013155, 081331013838, 081331076770, 081331316996, 081331316996, 081333103473, 081333947773, 081334095893, 081335989000, 081338329878, 081338475717, 081338515768, 081338611567, 081338996453, 081340148580, 081343004633, 081345225500, 081346399579, 081347615254, 081350041119, 081351676647, 081353940922, 081353996789, 081357353605, 081357644900, 081360748299, 081361567941, 081364021808, 081366234560, 081366764003, 081367134530, 081367203776, 081368673666, 081370983374, 081372303855, 081373022999, 081373640766, 081374080991, 081374666041, 081374749538, 081375894408, 081378477777, 081379319998, 081380077719, 081380608243, 081380987019, 081380999272, 081381133133, 081381829883, 081382541888, 081383326179, 081383528080, 081384887889, 081385009500, 081385385008, 081386301112, 081386999843, 081387872027, 081390083850, 081390436031, 081391119100, 081391688168, 081391718917, 081392928240, 081393008886, 081393416644, 081393657971, 081394383972, 081398554140, 081398727988, 081510100032, 081510101334, 081511731383, 081513220008, 081513351381, 081513367095, 081513384700, 081514271198, 081519101445, 081519647195, 081519982215, 081522989818, 081524154858, 081532989888, 081542080160, 081543417781, 081548670385, 081554253867, 081555997271, 081556407727, 081572072268, 081572259062, 081572757670, 081573445375, 081574576816, 081574939189, 081575454504, 081575757548, 081584642393, 081584902037, 081586000959, 081586331189, 081586431282, 081586780400, 081645490454, 081645490454, 081703917658, 081802303959, 081802773298, 081802773298, 081802902501, 081803117509, 081805329905, 081806071565, 081806300007, 081806899669, 081806936232, 081806944856, 081807188654, 081807788566, 081807807111, 081807832008, 081807990140, 081808000357, 081808338163, 081808355976, 081808601762, 081808762898, 081808960657, 081808972947, 081828508205, 081902381387, 081903395376, 081905073990, 081905340941, 081905383301, 081906417427, 081908037667, 081908158541, 081908303047, 081908847227, 081908889072, 081909508989, 081910004639, 081910245656, 081911900002, 081915479151, 081928111993, 081931362156, 081931462111, 081931606722, 081932030662, 081932504777, 081932585787, 081932901007, 081938800020, 081953903765, 081973088393, 081994523333, 081998473008, 081999169629, 082110104027, 082110265525, 082111482466, 082111613141, 082112267914, 082112434393, 082112499929, 082112567474, 082112898907, 082113488857, 082114948788, 082119119787, 082119333975, 082119909973, 082120551343, 082120985661, 082121577729, 082121880009, 082122587833, 082122713329, 082122759962, 082122898854, 082125259212, 082127468002, 082129980218, 082131942006, 082133631010, 082134668202, 082134747474, 082135023339, 082136500697, 082136519991, 082137639294, 082137639294, 082137671432, 082137794118, 082138546677, 082139085858, 082139327808, 082139679187, 082140933337, 082141043213, 082143717128, 082144639450, 082146511811, 082157555326, 082157985227, 082158418158, 082160782971, 082160865459, 082165954100, 082167453185, 082168116688, 082169663838, 082170077568, 082173557707, 082175270812, 082182177773, 082184996335, 082187238906, 082193938800, 082194212100, 082199767103, 082210245282, 082211175361, 082213636588, 082217797733, 082219196000, 082219437640, 082221582305, 082223333993, 082225433638, 082225469180, 082225874555, 082226231520, 082226319334, 082226631080, 082226780785, 082227991012, 082230324305, 082231121652, 082231403331, 082231558700, 082232736668, 082234448208, 082234866661, 082234901254, 082236538535, 082242313800, 082242715150, 082242983322, 082243520331, 082243614556, 082245185725, 082245687117, 082246250426, 082250176544, 082251854945, 082255199683, 082264660066, 082264669922, 082265155590, 082265194666, 082272121189, 082276851467, 082277107449, 082279554500, 082279988998, 082280001088, 082280808647, 082283907049, 082286658358, 082288000500, 082298451478, 082298750830, 082299006090, 082299165648, 082299382346, 082299612799, 082301365193, 082302223223, 082306262222, 082310769558, 082310908409, 082315838991, 082322746799, 082323232080, 082323279394, 082324182524, 082324315506, 082325411159, 082325848984, 082326794504, 082327718003, 082328275641, 082330636761, 082332423325, 082335404201, 082335928894, 082338225127, 082340506960, 082345545544, 082362223456, 082367539686, 082372775501, 082385167664, 083117771689, 083811189717, 083829192930, 083830660495, 083830953000, 083831211107, 083831812570, 083844567784, 083854013087, 083854231040, 083870868168, 083871623032, 083872284668, 083877699733, 083878925630, 083891390039, 083897970998, 085101736000, 085104383095, 085200800055, 085208088000, 085208809089, 085210022225, 085211347154, 085213475999, 085215103975, 085215619991, 085216773773, 085217844544, 085219157417, 085219249439, 085222356884, 085225093570, 085225404013, 085225971855, 085225987998, 085226373031, 085228781708, 085230848235, 085233883332, 085242414888, 085244175734, 085246678978, 085247843645, 085250542601, 085260086444, 085261747915, 085261848409, 085263456345, 085263950030, 085267280188, 085275566707, 085277788234, 085280005090, 085283022632, 085283862676, 085285317981, 085286861770, 085292343836, 085292784894, 085293379003, 085293698328, 085293698328, 085296891918, 085297123100, 085319902108, 085320066765, 085320200088, 085321507575, 085322776622, 085337360333, 085338297979, 085347243554, 085356638989, 085365011619, 085370850888, 085385137076, 085608565586, 085640076941, 085640082106, 085640092012, 085640145172, 085640153005, 085640248929, 085640451082, 085641297633, 085643122999, 085643677490, 085647155542, 085647341056, 085647428000, 085647723457, 085648891680, 085655444584, 085655543787, 085691185609, 085691695522, 085693890492, 085695555870, 085697577727, 085697709955, 085701270020, 085704686809, 085706640215, 085710195070, 085710427272, 085711045609, 085711130800, 085713350666, 085717118748, 085717243599, 085717991617, 085718559211, 085719953431, 085719960258, 085723750291, 085725840885, 085725910727, 085726222624, 085727221717, 085727450880, 085727848896, 085728705589, 085728742429, 085729119116, 085729362629, 085729692856, 085732014354, 085732212990, 085732212990, 085735554673, 085740040686, 085740213491, 085740213491, 085740964870, 085741344545, 085741512399, 085747963247, 085748095100, 085749599737, 085770605824, 085770864425, 085771828499, 085774946283, 085774955777, 085775569318, 085776882227, 085777039500, 085780838785, 085781307301, 085781598431, 085781650411, 085782496999, 085794012448, 085794309990, 085795670438, 085799002397, 085799716437, 085799800387, 085799932226, 085799963229, 085810101868, 085814448324, 085814546228, 085821567056, 085846310961, 085849084405, 085852758241, 085855267109, 085857646987, 085860099999, 085865809717, 085867443265, 085867861910, 085868151505, 085868666890, 085868947842, 085876239767, 085880333957, 085881118168, 085881212559, 085881581714, 085882404227, 085883047370, 085885867898, 085891103335, 085894117210, 085920044225, 085920111346, 085921565332, 085922476799, 085927533114, 085954243490, 085959421159, 085959421159, 085959451617, 087717078777, 087734060906, 087736390092, 087738074140, 087740982248, 087742614898, 087745578630, 087751831335, 087757301407, 087761053310, 087764585005, 087771177767, 087771211715, 087771671562, 087775196999, 087775865341, 087777571789, 087779258219, 087780002175, 087780493417, 087780747278, 087781664588, 087781914747, 087782002055, 087782045523, 087782550166, 087782866989, 087785067642, 087785250388, 087785451181, 087787534524, 087788272432, 087788389513, 087788555302, 087788865299, 087789171494, 087800019969, 087805050101, 087808784006, 087811148800, 087823783555, 087825456607, 087825825755, 087829443000, 087829881310, 087831999757, 087832941927, 087832946117, 087833996162, 087834767680, 087836557001, 087838977000, 087839001199, 087839187878, 087839803250, 087850095524, 087851070803, 087851630707, 087852074959, 087853418252, 087853922313, 087857114805, 087859568666, 087859882282, 087860008251, 087860008251, 087860197117, 087860213986, 087861200094, 087864222993, 087868612833, 087870809909, 087873768776, 087877228959, 087877333322, 087877816646, 087878227377, 087878797091, 087878862157, 087878862157, 087878991235, 087881401178, 087881675619, 087881813969, 087881828360, 087882813355, 087882840433, 087883279759, 087883279759, 087883333777, 087883456261, 087883848699, 087883924142, 087884082889, 087884588999, 087885007800, 087885323805, 087885526991, 087885589019, 087885659008, 087886169918, 087886173815, 087886201188, 087886289009, 087886311611, 087888139777, 087888766756, 087888951964, 087889828002, 087894078436, 087897488877, 089501149918, 089501225117, 089501381000, 089509097851, 089509432840, 089601346845, 089604560047, 089612604597, 089614266574, 089618276501, 089620571245, 089628644654, 089629703637, 089630387161, 089632668420, 089634514724, 089636278887, 089643507949, 089651518038, 089663062561, 089668584772, 089668817219, 089671425909, 089671643277, 089673131484, 089676213611, 089676747454, 089678930770, 089682127336, 089689483313, 089689891990, 0812255255798, 0813213800200, 0895321847075, 0895330700404, 0895357597648, 0895360792922, 0895387507678, 0895397288721, 0895631796117";

	$batch = explode(",", $numbers);
	$data = '';
	$dataPerBatch = 25;

	for ($i = 0; $i < sizeof($batch); $i++) {
		if ($i % $dataPerBatch == 0) $data .= '<br /><br />Batch ' . ($i/$dataPerBatch+1) . '<br />' . $batch[$i] . ',';
		else $data .= $batch[$i] . ',';
	}

	return $data;
});

Route::get('/', 'HomeController@index');
Route::get('/contactus', 'HomeController@contactus');

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@doLogin');

Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@doRegister');

Route::get('/logout', 'UserController@logout');

Route::get('/bookings/create/{date?}', 'BookingController@create');
Route::get('/bookings/sorted', 'BookingController@index_sorted');

Route::get('/payments/confirm/{id}', 'PaymentController@confirm');

Route::resources([
	'bookings'	=> 'BookingController',
	'payments'	=> 'PaymentController',
]);
