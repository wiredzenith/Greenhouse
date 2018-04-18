<!DOCTYPE html>
<html lang="en-US">

<head>
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="img/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="css/master.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Gahering Greenhouse</title>
</head>

<body>
  <div class="menubar">
    <ul class="menu">
      <li class="menu-icon">
        <a href="index.php">
            <img src="img/greenhouse.png" alt="greenhouse" title="Home">
            <p>Home</p>
          </a>
      </li>
      <li class="menu-icon">
        <a href="graph.php">
            <img src="img/rain.png" alt="rain cloud" title="Graph">
            <p>Graph</p>
          </a>
      </li>
      <li class="menu-icon">
        <a href="control.php">
            <img src="img/earth.png" alt="earth" title="Control">
            <p>Control</p>
          </a>
      </li>
      <li class="menu-icon" style="float:right">
        <a class="active" href="about.php">
						<img src="img/atomic-energy.png" alt="energy" title="About">
						<p>About</p>
          </a>
      </li>
    </ul>
  </div>

  <div id="page-about">
    <div id="page-links">
      <a href="#about-me" style="text-decoration:none;"><h4>About Me</h4></a>
      <p> | </p>
      <a href="#video" style="text-decoration:none;"><h4>Video</h4></a>
    </div>
    <h1 id="aboutMainHeader">
        About my project
      </h1>
    <p class="aboutText">
      Food will grow wherever it can. But sometimes it needs help. By monitoring and controlling the environment in which our food is grown we can increase yield and quality. To ensure ideal growth I want to monitor important environmental conditions such as
      air temperature, humidity, soil temperature and moisture as well as light intensity to ensure that all of the plant life in the greenhouse gets the light it needs. To make sure that I am making a difference all of the monitored data elements are
      collected and uploaded to a web server where they are graphed to show long term impact of ideal growing conditions.
      <p>
      </p>
      I will use a range of sensors to record the most important environmental conditions. For temperature and humidity I am using an adafruit module which uses I2C, to give accurate readings. To find the level of moisture in the soil I have a soil moisture
      probe from DFRobot, which will give me simple to read analogue voltages that can then be interpreted to let me know how wet or dry the soil is. Another I2C sensor I will use is an ambient light sensor that will allow me to measure light intensity
      in lux as well as light in the infrared spectrum and the visible light spectrum too, which will let me know if the plants are getting the right kind of light for their stage of development. All of these elements will be controlled and read in by
      the Arduino Uno with Wi-Fi. For programming the Arduino I will use my experience with C/C++, and HTML and CSS for developing the web page.

    </p>
    <div id="diagram">
      <div class="mxgraph" style="max-width:100%;border:1px solid transparent;" data-mxgraph="{&quot;highlight&quot;:&quot;#0000ff&quot;,&quot;nav&quot;:true,&quot;zoom&quot;:0.15,&quot;resize&quot;:true,&quot;toolbar&quot;:&quot;zoom lightbox&quot;,&quot;edit&quot;:&quot;_blank&quot;,&quot;xml&quot;:&quot;&lt;mxfile userAgent=\&quot;Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) draw.io/8.0.6 Chrome/58.0.3029.110 Electron/1.7.5 Safari/537.36\&quot; version=\&quot;8.3.5\&quot; editor=\&quot;www.draw.io\&quot; type=\&quot;device\&quot;&gt;&lt;diagram id=\&quot;227c9c1c-5922-1264-7a09-1719379e950e\&quot; name=\&quot;Page-1\&quot;&gt;7VpNc+I4EP01HENZ8vcxwDCZraQ2u0xVjilhC6wd2/LKIpD99SvZMtggMlAIMlPABdMtu633HlK3pJ49zFZfGSqSJxrjtAeteNWzRz0I7dC2xJe0vNcW6HvKMmckrm1gY5iQ/7AyNs0WJMZlpyGnNOWk6Bojmuc44h0bYowuu81mNO1GLdAc7xgmEUp3rS8k5omyAi/cOB4wmScqdAD92jFF0Y85o4tcxctpjmtPhprHqD6WCYrpsmWyv/TsIaOU11fZaohTiWuDWH3feI93/coM5/yQG2B9wxtKF6rX6r34ewND1REs24OePVgmhONJgSLpXQrmhS3hWarcEc1IpK5LzuiPNXTiRewBYpHiWf6akTQd0pSyKpA9Ho+ckUBgUGBGMswxk3FIPlfN6+e1bpgGruNKz26vFRBvmHG8apkUCl8xFQHYu2iivNC2g/oeJVfgu/XvZYt7q9Fm0uIdWo6yIqW4+frxG+jFhUJ/D3X+MVRYp1ABNODPZjMYRTqUY2/quZ4hlB2ri7ID3f4uzoGvgRn4wD0dZvsXEvxwOBYfHeZeFODpTHjmDMVE4D0iTAxxhObCn1MmA5jgA7jhp4re/VTNYxC72NfhH3q+jUxpPuhi7AKd5H1XA7IdGsDYu0KMgeVdFuTPHbw/CWTvwkoOrgFkx9vKQwLrYJShCZTDq0TZuTDKzZx6XTCH4YVRBteI8hHjshmUD0jjRKFbyEuSVVV3G1PZUyLK7vuUzGV+y2nRsj6iKU6faUlU9julnNNMNEilY7Autbu1jPiIJlWw+7KoVweqfLz5MSMryflAvc8o4VwuK9zLTsNxFOegTyKaz4jQBusL2oU1RhyJL2kvxTdDeUyzu4ihGW9sTiDBImV097okM/J6B2DQL2QJO+iWFUcIqVo+kPdzpDAIDRW9m7WMdd4U7AoHaoXjmhDOAbnpTTimhRO3asklLrmhUcgKgm0tOZfUki479FLZuxkVvWqLyvt3QRvHXVnV54I/CwgIVhuvuJrL73sWL0hORYMXMibNQ8X71M+tG+3oVsDGu3LtTgKKHA1fSMk5EmRgptF5RuJYhtFOVt3pbL9ajC3pbFUF0D548gFGJh9dvmqE97/Ff36KWdXZ5xvvP8s6oOVclHioy6DbxDcE1bayQPlBYrC0YpjgvBRkQWtUjeVrLdSP7Yaasm3LoUr0tLG/46zADPEFwz04fFgIHRAusBIQWXJS2qfMfW/z+0nYhF7DrWU4/QqRfa4kGepKkbPJ9QVPhXOCmQDoaLXeFKNVDAD6qU0rGc+EZHSbFWeTzJ8LXix4ebaxzddGfZSYiaDDsYw1fMCIdxR7G9EO16fnX1ifzumpl16Lzw/Pwnn//O26Cd5Z2Dl8VwNaJgjW1edGCH56n/z1qLKpKSrxlfPsbpfO+pnG0xENTRCt278620wzTBDj/5xvpvFcXdQ/0BuaRIwU8hnVK8ijJR+PMrf55uNNE0crU0cnU2BCpgbWePSSfPj+JIcjkTZXp8JuNLdpDvQ0a6cdIzSfvqQT6FfyBIwJ1hVG10ize8hRLO2cA0LvdJadAzaa18cjq3VrVCZrNH5GRrNtkK3m8nhqPysjhPsVDQUjJe4TeZlj/prQNJUxtjfvrOrT+2j9XapGHe8ClnaXwABRwN0srK3zAwdquHLCYJcr2wpP58rdXWv7pvD7Df4tOzR1ZLXntKkJ5pzA32YOOJaGOdeGmrHUPn4slbtL68PDla91Otv+8j8=&lt;/diagram&gt;&lt;/mxfile&gt;&quot;}"></div>
      <script type="text/javascript" src="https://www.draw.io/js/viewer.min.js"></script>
    </div>
    <h2 id="aboutSecondHeader">
        Another heading for something
      </h2>
    <p class="aboutText">
      Some text about somthing discribing something
    </p>
    <video id="video" width="100%" height="auto" controls>
      <source src="video/movie.webm" type="video/webm" preload="auto">
      Sorry, your browser doesn't support the video element.
    </video>
    <div class="aboutMe">
      <p>
        <img src="img/profile.png" alt="profile_picture">
      </p>
      <h2 id="about-me">About Me</h2>
    </div>
    <div id="pageIdImg">
      <img src="img/atomic-energy.png" alt="atomic-energy" style="width:100px;height:100px">
    </div>

  </div>
  <div class="footer">
    <footer>Created by: Tomasz Klebek
      <br>Icons made by
      <a href="http://www.freepik.com/"> freepik</a> from<a href="http://www.flaticon.com"> www.flaticon.com</a>
    </footer>

  </div>
</body>

</html>
