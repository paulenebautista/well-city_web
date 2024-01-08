<?php
    include('../temp/header.php') 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPS Tracker with Leaflet</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel ="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="cont">
        <h1><b>Well City Search Map</b></h1>
        <div>
            <div id="map" style="width: 100%; height: 600px; border-radius:2%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);"></div>
                <br>
        </div>
        <div class="loc">
            <select id="locationSelect" onchange="moveToSelectedLocation(this)" >
                <option>--Select Hospital--</option>
                <option value="14.61416,120.9890689,25">Hospital of Infant Jesus</option>
                <option value="14.6255846,120.9886466,25">Chinese General Hospital and Medical Center</option>
                <option value="14.6062156,120.9842759,25">Dr Jose Fabella Memorial Hospital</option>
                <option value="14.6143273,120.9822566,25">Jose R. Reyes Memorial Medical Center</option>
                <option value="14.5819484,120.9829913,25">Manila Doctors Hospital</option>
                <option value="14.5825352,120.9856015,25">Manila Med</option>
                <option value="14.5777215,120.9834267,25">Philippine General Hospital</option>
                <option value="14.5644279,120.9869911,25">Bagong Ospital ng Maynila</option>
                <option value="14.6137163,120.9809048,25">San Lazaro Hospital</option>
                <option value="14.583335,121.016499,25">Sta. Ana Hospital</option>
                <option value="14.6348716,120.9630926,25">Tondo Medical Center</option>
                <option value="14.587556,120.9751731,25">Seamen's Hospital</option>

                <!-- Add more options as needed -->
            </select>
                &emsp13;
                <button onclick="goToCurrentLocation()" class="btn">
                <img src ="stockimg/location.png" alt="locIcon" width="25px"></button>
        </div>




        <hr>
        <h1>Hospital's inside Manila City</h1>

        <div class="card-container">
            <div class="card">
                <img src="stockimg/hospitaloinfantjesus.jpg">
                <div class="card-content">
                    <p>                    
                        <a href="http://hijmc.com/" class="btn2">Official Website</a>	
                        <a href="https://www.facebook.com/hijchildcare" class="btn2">Facebook Page</a>	
                    </p>
                    <h3>Hospital of Infant Jesus</h3>
                    <p>
                        <b>Contact No:</b> 87312771 – 76 <br>
                        <b>Address: </b> Laong Laan Rd, Sampaloc, Manila, 1008 Metro Manila<br><br>
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="stockimg/chinesehospital.jpg">
                <div class="card-content">
                    <p><a href="https://cghmc.com.ph/online/" class="btn2">Official Website</a>	
                        <a href="https://www.facebook.com/cghmcofficial/" class="btn2">Facebook Page</a>	</p>
                    <h3>Manila	Chinese General Hospital and Medical Center</h3>
                    <p>
                        <b>Contact No:</b> 8711 4141 <br>
                        <b>Address: </b> 286 Blumentritt Rd, Santa Cruz, Manila, 1014 Metro Manila
                    </p>    
                    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/josememorial.jpg">
                <div class="card-content">
                    <p>
                        <a href="http://fabella.doh.gov.ph/" class="btn2">Official Website</a>	
                        <a href="https://www.facebook.com/djfmh" class="btn2">Facebook Page</a>	</p>
                    <h3>Dr Jose Fabella Memorial Hospital</h3>
                    <p>
                        <b>Contact No:</b> 8734-5561 <br>
                        <b>Address: </b> 1003 Lope de Vega St, Santa Cruz, Manila, 1003 Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/reyesmemorial.jpg">
                <div class="card-content">
                    <p>                    
                        <a href="https://jrrmmc.gov.ph/	" class="btn2">Official Website</a>	
                        <a href="https://www.facebook.com/OfficialJRRMMC" class="btn2">Facebook Page</a>	
                    </p>
                    <h3>Jose R. Reyes Memorial Medical Cente</h3>
                    <p>
                        <b>Contact No:</b> 8711 9491 <br>
                        <b>Address: </b> JX7J+PWJ, Rizal Ave, Santa Cruz, Manila, Metro Manila<br><br>
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="stockimg/maniladoctors.jpg">
                <div class="card-content">
                    <p><a href="http://www.maniladoctors.com.ph/" class="btn2">Official Website</a>	
                        <a href="https://www.facebook.com/maniladoctorshospital/" class="btn2">Facebook Page</a>	</p>
                    <h3>Manila Doctors Hospital</h3>
                    <p>
                        <b>Contact No:</b> 85580888 <br>
                        <b>Address: </b> 667 United Nations Ave, Ermita, Manila, 1000 Metro Manila
                    </p>    
                    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/manilamed.jpg">
                <div class="card-content">
                    <p>
                        <a href="http://www.manilamed.com.ph/" class="btn2">Official Website</a>	
                        <a href="https://www.facebook.com/ManilaMed/" class="btn2">Facebook Page</a>	</p>
                    <h3>Medical Center Manila / Manila Med	</h3>
                    <p>
                        <b>Contact No:</b> 8523 8131 <br>
                        <b>Address: </b> 850 United Nations Ave, Paco, Manila, Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/pgh.jpg">
                <div class="card-content">
                    <p>
                        <a href="https://www.facebook.com/philippinegeneralhospitalofficial" class="btn2">Facebook Page</a>	</p>
                    <h3>Philippine General Hospital	</h3>
                    <p>
                        <b>Contact No:</b> 8554 8400, 0932 339 0827, 0966 549 2755, 155-200 <br>
                        <b>Address: </b> HXHP+36Q, Taft Ave, Ermita, Manila, 1000 Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/ospitalngmaynila.jpg">
                <div class="card-content">
                    <p>
                        <a href="https://www.facebook.com/ommcofficial" class="btn2">Facebook Page</a>	</p>
                    <h3>Bagong Ospital ng Maynila	</h3>
                    <p>
                        <b>Contact No:</b> 85246063 <br>
                        <b>Address: </b>719 Quirino Avenue, corner Roxas Blvd, Malate, Manila, 1004 Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/sanlazarohospital.jpg">
                <div class="card-content">
                    <p>
                        <a href="https://slh.doh.gov.ph/" class="btn2">Official Website</a>	
                    </p>
                    <h3>San Lazaro Hospital	</h3>
                    <p>
                        <b>Contact No:</b> 8732 3776 - 78 local 187, 0920 828 4625, 0966 208 6087	 <br>
                        <b>Address: </b> Quiricada St, Santa Cruz, Manila, 1003 Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/staanahospital.jpg">
                <div class="card-content">
                    <p>
                        <a href="https://www.facebook.com/staanahospitalofficial2019/" class="btn2">Facebook Page</a>	</p>
                    <h3>Sta. Ana Hospital	</h3>
                    <p>
                        <b>Contact No:</b> 85168435 <br>
                        <b>Address: </b> H2M8+8HQ, New Panaderos, Santa Ana, Manila, Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/tondomedical.png">
                <div class="card-content">
                    <p>
                        <a href="http://tmc.doh.gov.ph/	" class="btn2">Official Website</a>	
                        <a href="Honorio Lopez Blvd, Tondo, Manila, Metro Manila" class="btn2">Facebook Page</a>	</p>
                    <h3>Tondo Medical Center</h3>
                    <p>
                        <b>Contact No:</b> 88659000	 <br>
                        <b>Address: </b> 850 United Nations Ave, Paco, Manila, Metro Manila
                    </p>    
                </div>
            </div>

            <div class="card">
                <img src="stockimg/seamenhospital.jpg">
                <div class="card-content">
                    <h3>Seamen's Hospital</h3>
                    <p>
                        <b>Contact No:</b> 8523 2692, 8527 8116 <br>
                        <b>Address: </b>San Jose St, Intramuros, Manila, 1002 Metro Manila
                    </p>    
                </div>
            </div>

        <!-- end of cont -->
        </div>
   


    <script src="script.js"></script>
    

</body>
<?php 
    include ('../temp/footer.php'); 
?>
</html>

