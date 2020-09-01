var Fpe={options:{},broadcast:[],next:[],prev:[],labels:{actor_on_camera:"On-Camera Principal",stunt_performer:"Stunt Performer",pilot:"Pilot",speciality_act:"Speciality Act",dancer:"Dancer",actor_off_camera:"Off-Camera Principal (Ex. Voiceover)",singer:"Singer",extra:"Extra Performer",wildspot:"Wildspot 13 weeks",program_a:"Program Class A",cable:"Cable Only",local_cable:"Local Cable",dealer:"Dealer",internet:"Move-over-Internet",newmedia:"Move-over-New Media",internet2:"Made for Internet",newmedia2:"Made for New Media",spanish:"Spanish Language Program",spanish_wildspot:"Spanish Language Wildspot",foreign:"Foreign Use",theatrical:"Theatrical use",demo:"Demo","6m":"6 months w/o New York","6m_ny":"6 months w/ New York",announcer:"Announcer",solo_duo:"Solo or Duo",group_3:"Group 3-5",group_6:"Group 6-8",group_9:"Group 9 or more",creative_session:"Creative Session Calls",singers_contractors:"Singers Contractors",network:"Regional Network",program:"Program commercials - 13 weeks",regional:"Regional network with at least one major",psa:"PSAs",radio_dealer:"Dealer",radio_foreign:"Foreign Use - 18 month use",radio_psa:"PSAs",local:"Local program uses","1_week_unlimited":"1 week unlimited use","4_week_unlimited":"4 week unlimited use","8_week_unlimited":"8 week unlimited use","13_week_unlimited":"13 week unlimited use","13_week_26_uses":"26 uses in 13 weeks","13_week_39_uses":"39 uses in 13 weeks","13_week_accross":"13 weeks use on across-the-board programs",category1:"Category I",category2:"Category II",ivr:"IVR/Phone Prompts",storecast:"Storecast",on:"On-Camera Performer",spokesperson:"On-Camera Spokesperson",off:"Off-Camera, 1st Hour",retakes:"Off-Camera, Retakes Entire Script",on_half:"On-Camera Performer - Half-Day",on_3:"On-Camera Performer - 3 Days",on_w:"On-Camera Performer - Weekly",off_short:"Off-Camera, 3 mins or less, half hour",off_retakes:"Off-Camera, Retakes Entire Script, (One Hour)",off_retakes2:"Off-Camera, Retakes Partial Script (30 Minutes)",madein:"Made-in/Played-in","50k":"Up to 50,000 subscribers","100k":"Up to 100,000 subscribers","150k":"Up to 150,000 subscribers","200k":"Up to 200,000 subscribers","250k":"Up to 250,000 subscribers","500k":"Up to 500,000 subscribers","750k":"Up to 750,000 subscribers","1000k":"Up to 1,000,000 subscribers"}},spanish_markets=[{value:"Albuquerque NM",code:"albuquerque--nm"},{value:"Atlanta GA",code:"atlanta--ga"},{value:"Austin TX",code:"austin--tx"},{value:"Boston MA",code:"boston--ma"},{value:"Chicago IL",code:"chicago--il"},{value:"Dallas-Fort Worth TX",code:"dallas-fort-worth--tx"},{value:"Denver CO",code:"denver--co"},{value:"El Centro CA; Yuma AZ; and Mexicali MX (combined)",code:"el-centro--ca--yuma--az--and-mexicali--mx--combined"},{value:"El Paso TX and Juarez MX (combined)",code:"el-paso--tx-and-juarez--mx--combined"},{value:"Fresno and Visalia CA (combined)",code:"fresno-and-visalia--ca--combined"},{value:"Houston TX",code:"houston--tx"},{value:"Laredo TX and Nueva Laredo MX (combined)",code:"laredo--tx-and-nueva-laredo--mx--combined"},{value:"Las Vegas NV",code:"las-vegas--nv"},{value:"Los Angeles CA",code:"los-angeles--ca"},{value:"McAllen TX; Brownsville TX; and Matamoros MX (combined)",code:"mcallen--tx--brownsville--tx--and-matamoros--mx--combined"},{value:"Miami FL",code:"miami--fl"},{value:"New York NY",code:"new-york--ny"},{value:"Orlando FL",code:"orlando--fl"},{value:"Philadelphia PA",code:"philadelphia--pa"},{value:"Phoenix AZ",code:"phoenix--az"},{value:"Puerto Rico",code:"puerto-rico"},{value:"Sacramento CA",code:"sacramento--ca"},{value:"San Antonio TX",code:"san-antonio--tx"},{value:"San Diego CA and Tijuana MX",code:"san-diego--ca-and-tijuana--mx"},{value:"San Francisco CA",code:"san-francisco--ca"},{value:"Tampa FL",code:"tampa--fl"},{value:"Washington DC",code:"washington--dc"}],costs={agent_percent:10,wildspot_markets:{atlanta:6,austin:2,baltimore:3,boston:6,charlotte:3,cincinnati:2,cleveland:4,"columbus-oh":2,"dallas-fort-worth":7,denver:4,detroit:5,"grand-rapids-kalamazoo-battle-creek":2,"greenville-spartanburg-asheville-anderson-nc":2,"hartford-new-haven":2,houston:6,indianapolis:3,"kansas-city":2,"las-vegas":2,"mexico-mexico-city":49,miami:4,milwaukee:2,"minneapolis---st--paul":4,montreal:5,nashville:2,"norfolk-portsmouth-newport-news":2,"oklahoma-city":2,"orlando-daytona-beach":4,philadelphia:8,phoenix:5,pittsburgh:3,"portland--or":3,"puerto-rico":3,"raleigh-durham":3,"sacramento-stockton":3,"salt-lake-city":2,"san-antonio":2,"san-diego":3,"san-francisco":7,"seattle-tacoma":5,"st--louis":3,"tampa-st--petersburg":5,toronto:8,"vancouver-b-c-":3,"washington-d-c-":6,"west-palm-beach---ft--pierce":2},spanish_markets_weights:{"albuquerque--nm":3,"atlanta--ga":2,"austin--tx":2,"boston--ma":2,"chicago--il":9,"dallas-fort-worth--tx":9,"denver--co":4,"el-centro--ca--yuma--az--and-mexicali--mx--combined":6,"el-paso--tx-and-juarez--mx--combined":11,"fresno-and-visalia--ca--combined":4,"houston--tx":11,"laredo--tx-and-nueva-laredo--mx--combined":2,"las-vegas--nv":2,"los-angeles--ca":39,"mcallen--tx--brownsville--tx--and-matamoros--mx--combined":8,"miami--fl":17,"new-york--ny":32,"orlando--fl":3,"philadelphia--pa":3,"phoenix--az":6,"puerto-rico":21,"sacramento--ca":3,"san-antonio--tx":8,"san-diego--ca-and-tijuana--mx":12,"san-francisco--ca":7,"tampa--fl":3,"washington--dc":3},fees:{tv:{principal_on:{session:671.7,broadcast:{wildspot:{unit_2_25:22.99,unit_26:8.53,ny:1320,ny_unit:8.53,chi:1150.55,chi_unit:8.53,la:2191.1,la_unit:8.53,major2:1816.55,major2_unit:8.53,major3:2191.1,major3_nit:8.74},cable:{min:671.7,tiers:{50:11.96,100:10.39,150:8.82,200:7.25,1000:.85,2500:.81,3000:.18}},local_cable:{"50k":29.64,"100k":59.6,"150k":89.24,"200k":119.04,"250k":148.68,"500k":297.62,"750k":446.3,"1000k":595.08},program_a:{1:671.7,2:157.1,"3-13":124.65,"13g":1923.2,"13g_unit":117.8},dealer:{A:{"6m":2229.3,"6m_ny":2520.7},B:{"6m":3343.95,"6m_ny":3875.7}},internet:{"4week":839.65,"8week":1175.5,"1year":2854.75},newmedia:{"4week":839.65,"8week":1175.5,"1year":2854.75},internet2:{"4week":839.65,"8week":1175.5,"1year":2854.75},newmedia2:{"4week":839.65,"8week":1175.5,"1year":2854.75},spanish:2668.15,spanish_wildspot:{unit_1:705.25,unit_2_25:24.14,unit_26:8.96},demo:503.9,theatrical:671.7}},principal_off:{session:505.05,broadcast:{wildspot:{unit_2_25:22.99,unit_26:8.53,ny:1320,ny_unit:8.53,chi:1150.55,chi_unit:8.53,la:2191.1,la_unit:8.53,major2:1816.55,major2_unit:8.53,major3:2191.1,major3_nit:8.74},cable:{min:505.05,tiers:{50:7.93,100:6.92,150:5.87,200:4.83,1000:.57,2500:.55,3000:.12}},local_cable:{"50k":20.22,"100k":40.71,"150k":61.1,"200k":81.48,"250k":101.81,"500k":203.78,"750k":305.54,"1000k":407.46},program_a:{1:122.95,2:97.8,"3-13":44.4,"13g":1487.95,"13g_unit":89.5},dealer:{A:{"6m":1610.05,"6m_ny":1755.7},B:{"6m":2411.35,"6m_ny":2637.3}},internet:{"4week":631.3,"8week":883.85,"1year":2146.45},newmedia:{"4week":631.3,"8week":883.85,"1year":2146.45},internet2:{"4week":631.3,"8week":883.85,"1year":2146.45},newmedia2:{"4week":631.3,"8week":883.85,"1year":2146.45},spanish:2006.45,spanish_wildspot:{unit_1:530.3,unit_2_25:16.52,unit_26:7.03},demo:503.9,theatrical:505.05}},stunt_performer:{session:671.7},pilot:{session:795.5},speciality_act:{session:671.7},dancer:{session:671.7},singer:{session:505.05},extra:{session:366.35}},radio:{announcer:{session:298.1,multitracking:329.45,broadcast:{wildspot:{13:{unit_2_25:4.39,unit_26:3.3,ny:446.35,ny_unit:3.3,chi:404.85,chi_unit:3.3,la:404.85,la_unit:3.3,major2:544.4,major2_unit:3.3,major3:687.9,major3_nit:3.3},8:{unit_2_25:3.51,unit_26:2.64,ny:357.05,ny_unit:2.64,chi:323.9,chi_unit:2.64,la:323.9,la_unit:2.64,major2:435.55,major2_unit:2.64,major3:550.3,major3_nit:2.64}},network:{"1_week_unlimited":504.45,"4_week_unlimited":818.4,"8_week_unlimited":1303.65,"13_week_unlimited":1617.75,"13_week_26_uses":808.9,"13_week_39_uses":1218.2,"13_week_accross":1693.95},radio_dealer:{"26_weeks":806.2,"8_weeks":403.05,"26_weeks_effects":255.35,"8_weeks_effects":242.3},internet:{"4week":372.65,"8week":447.15,"1year":1192.4},newmedia:{"4week":372.65,"8week":447.15,"1year":1192.4},internet2:{"4week":372.65,"8week":447.15,"1year":1192.4},newmedia2:{"4week":372.65,"8week":447.15,"1year":1192.4},single_market:{"13_week":205.45,"1_year":616.45},demo:205.45,regional:976.2,program:976.2,local:324,radio_foreign:591.45,psa:674.45}},solo_duo:{session:298.1,multitracking:329.45,broadcast:{wildspot:{13:{unit_2_25:4.39,unit_26:3.3,ny:446.35,ny_unit:3.3,chi:404.85,chi_unit:3.3,la:404.85,la_unit:3.3,major2:544.4,major2_unit:3.3,major3:687.9,major3_nit:3.3},8:{unit_2_25:3.51,unit_26:2.64,ny:357.05,ny_unit:2.64,chi:323.9,chi_unit:2.64,la:323.9,la_unit:2.64,major2:435.55,major2_unit:2.64,major3:550.3,major3_nit:2.64}},network:{"1_week_unlimited":504.45,"4_week_unlimited":818.4,"8_week_unlimited":1303.65,"13_week_unlimited":1617.75,"13_week_26_uses":808.9,"13_week_39_uses":1218.2,"13_week_accross":1693.95},radio_dealer:{"26_weeks":806.2,"8_weeks":403.05},internet:{"4week":372.65,"8week":447.15,"1year":1192.4},newmedia:{"4week":372.65,"8week":447.15,"1year":1192.4},internet2:{"4week":372.65,"8week":447.15,"1year":1192.4},newmedia2:{"4week":372.65,"8week":447.15,"1year":1192.4},demo:205.45,regional:976.2,program:976.2,local:324,radio_foreign:591.45,radio_psa:674.45}},group_3:{session:329.45,multitracking:329.45,broadcast:{wildspot:{13:{unit_2_25:2.28,unit_26:1.95,ny:242.75,ny_unit:1.95,chi:242.75,chi_unit:1.95,la:242.75,la_unit:1.95,major2:289.9,major2_unit:1.95,major3:323,major3_nit:1.95},8:{unit_2_25:2.17,unit_26:1.85,ny:230.6,ny_unit:1.85,chi:230.6,chi_unit:1.85,la:230.6,la_unit:1.85,major2:275.4,major2_unit:1.85,major3:306.8,major3_nit:1.85}},network:{"1_week_unlimited":378.55,"4_week_unlimited":629.35,"8_week_unlimited":1303.65,"13_week_unlimited":1003,"13_week_26_uses":622,"13_week_39_uses":852.95,"13_week_accross":1302.65},radio_dealer:{"26_weeks":416.95,"8_weeks":208.5},internet:{"4week":274.5,"8week":329.4,"1year":878.4},newmedia:{"4week":274.5,"8week":329.4,"1year":878.4},internet2:{"4week":274.5,"8week":329.4,"1year":878.4},newmedia2:{"4week":274.5,"8week":329.4,"1year":878.4},regional:976.2,program:457.6,local:324,radio_foreign:343.05,radio_psa:456.6}},group_6:{session:194.35,multitracking:291.55,broadcast:{wildspot:{13:{unit_2_25:1.95,unit_26:1.5,ny:215.5,ny_unit:1.64,chi:215.5,chi_unit:1.64,la:215.5,la_unit:1.64,major2:222.4,major2_unit:1.64,major3:249.9,major3_nit:1.64},8:{unit_2_25:1.85,unit_26:1.42,ny:204.75,ny_unit:1.42,chi:204.75,chi_unit:1.42,la:204.75,la_unit:1.42,major2:211.25,major2_unit:1.42,major3:237.4,major3_nit:1.42}},network:{"1_week_unlimited":378.55,"4_week_unlimited":562.75,"8_week_unlimited":896,"13_week_unlimited":1112.55,"13_week_26_uses":556.2,"13_week_39_uses":761.4,"13_week_accross":1164.95},radio_dealer:{"26_weeks":333.65,"8_weeks":166.8},internet:{"4week":242.95,"8week":291.55,"1year":777.4},newmedia:{"4week":242.95,"8week":291.55,"1year":777.4},internet2:{"4week":242.95,"8week":291.55,"1year":777.4},newmedia2:{"4week":242.95,"8week":291.55,"1year":777.4},regional:878.65,program:457.6,local:324,radio_foreign:236.6,radio_psa:365.25}},group_9:{session:172.4,multitracking:258.55,broadcast:{wildspot:{13:{unit_2_25:1.72,unit_26:1.5,ny:191.25,ny_unit:1.56,chi:191.25,chi_unit:1.56,la:191.25,la_unit:1.56,major2:197.9,major2_unit:1.56,major3:222.4,major3_nit:1.56},8:{unit_2_25:1.64,unit_26:1.42,ny:181.7,ny_unit:1.48,chi:181.7,chi_unit:1.48,la:181.7,la_unit:1.48,major2:188,major2_unit:1.48,major3:211.25,major3_nit:1.48}},network:{"1_week_unlimited":378.55,"4_week_unlimited":514.15,"8_week_unlimited":803.05,"13_week_unlimited":1019.25,"13_week_26_uses":508.25,"13_week_39_uses":691.7,"13_week_accross":1067.25},radio_dealer:{"26_weeks":208.55,"8_weeks":104.25},internet:{"4week":215.5,"8week":258.6,"1year":689.6},newmedia:{"4week":215.5,"8week":258.6,"1year":689.6},internet2:{"4week":215.5,"8week":258.6,"1year":689.6},newmedia2:{"4week":215.5,"8week":258.6,"1year":689.6},regional:790.2,program:457.6,local:324,radio_foreign:189.2,radio_psa:228.45}},creative_session:{session:266.9},singers_contractors:{session:102.35}},industrial:{category1:{on:519.5,on_half:337.5,on_3:1308,on_w:1826,off:425.5,off_addl:121,off_short:213,retakes:425.5,retakes_addl:124.5,spokesperson:945,spokesperson_add:519.5},category2:{on:647,on_half:420.5,on_3:1613,on_w:2261.5,off:474,off_addl:124.5,off_short:237,retakes:474,retakes_addl:124.5,spokesperson:1121,spokesperson_add:647},ivr:{first:425.5,half:254,over:124.5},storecast:{3:425.5,6:851}}}};