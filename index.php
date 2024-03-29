<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Owenzy Profile</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
  </head>
  <body>
    <nav id="desktop-nav">
      <div class="logo">Llorenz Lazaro</div>
      <div>
        <ul class="nav-links">
          <li><a href="#about">About</a></li>
          <li><a href="#montage">Montage</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="login.php">Feedback</a></li>
        </ul>
      </div>
    </nav>
    <nav id="hamburger-nav">
      <div class="logo">Llorenz Lazaro</div>
      <div class="hamburger-menu">
        <div class="hamburger-icon" onclick="toggleMenu()">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="menu-links">
          <li><a href="#about" onclick="toggleMenu()">About</a></li>
          <li><a href="#montage" onclick="toggleMenu()">Montage</a></li> 
          <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
          <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
          <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
          <li><a href="login.php" onclick="toggleMenu()">Feedback</a></li>
        </div>
      </div>
    </nav>
    <section id="profile">
      <div class="section__pic-container">
        <img src="profile.png" alt="Llorenz profile picture" />
      </div>
      <div class="section__text">
        <h1 class="title">Llorenz Lazaro</h1>
        <p class="section__text__p2">IT Student & Esports Player</p>
        <div id="socials-container">
          <img
            src="linkedin.png"
            alt="My LinkedIn profile"
            class="icon"
            onclick="location.href='https://www.linkedin.com/in/llorenz-lazaro-0548b5286/'"
          />
          <img
            src="github.png"
            alt="My Github profile"
            class="icon"
            onclick="location.href='https://github.com/Shogun013'"
          />
            <img
              src="facebook.png"
              alt="My LinkedIn profile"
              class="icon"
              onclick="location.href='https://www.facebook.com/llorenz.lazaro/'"
            />
        </div>
      </div>
    </section>
    <section id="about">
      <p class="section__text__p1">Discover more</p>
      <h1 class="title">About Me</h1>
      <div class="section-container">
        <div class="section__pic-container">
          <img
            src="profile pic2.jpg"
            alt="Profile picture"
            class="about-pic"
          />
        </div>
        <div class="about-details-container">
          <div class="about-containers">
            <div class="details-container">
              <h3>Experience</h3>
              <p>Esports <br />Player at Valorant and Computer Technician</p>
            </div>
            <div class="details-container">
              <h3>Education</h3>
              <p>BSIT-MI</p>
            </div>
          </div>
          <div class="text-container">
            <p>
                a tech enthusiast and gamer currently pursuing a Bachelor of Science in Information Technology, 
                specializing in Internet and Mobile Technology at the National University Fairview. 
                In the digital arena, they stand out as the MVP of their Valorant team, 
                leading them to victory in the 2022 intramurals and securing a respectable 4th place in the Alliance G Acad Arena. Beyond the pixels, 
                Llorenz Lazaro finds joy in the real world whether it's behind the wheel enjoying a drive or navigating the Facebook marketplace to buy and sell furniture. 
                This individual seamlessly balances the virtual and tangible aspects of life, embodying a passion for gaming, technology, and a knack for entrepreneurial endeavors.
            </p>
          </div>
          <div class="btn-container">
            <button
              class="btn btn-color-3"
              onclick="window.open('Resume.pdf')"
            >
              Download Resume
          </div>
        </div>
      </div>
    </section>
    <section id="montage">
      <p class="section__text__p1">Watch My Montage</p>
      <h1 class="title">Montage</h1>
      <div class="montage-video-container">
        <video class="montage-video" controls>
          <source src="Valorant.mp4" type="video/mp4">
        </video>
      </div>
    </section>
    <section id="experience">
      <p class="section__text__p1">Delve Into Mine</p>
      <h1 class="title">Experience</h1>
      <div class="experience-details-container">
        <div class="about-containers">
          <div class="details-container">
            <h2 class="experience-sub-title">Front-End Development</h2>
            <div class="article-container">
              <article>
                <div>
                  <h3>HTML</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <div>
                  <h3>CSS</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <div>
                  <h3>JavaScript</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <div>
                  <h3>XML</h3>
                  <p>Basic</p>
                </div>
              </article>
            </div>
          </div>
          <div class="details-container">
            <h2 class="experience-sub-title">Back-End Development</h2>
            <div class="article-container">
              <article>
                <div>
                  <h3>MS SQL</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <div>
                  <h3>Java</h3>
                  <p>Basic</p>
                </div>
              </article>
              <article>
                <div>
                  <h3>Python</h3>
                  <p>Basic</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="projects">
      <p class="section__text__p1">Navigate Through My Recent</p>
      <h1 class="title">Projects</h1>
      <div class="experience-details-container">
        <div class="about-containers">
          <div class="details-container color-container">
            <div class="article-container">
              <img
                src="prototype2.JPG"
                alt="Project 1"
                class="project-img"
              />
            </div>
            <h2 class="experience-sub-title project-title">Prototype UI & UI</h2>
            <div class="btn-container">
              <button
                class="btn btn-color-2 project-btn"
                onclick="location.href='https://www.canva.com/design/DAFy0uOqWYE/mD1XKQxTOGr90eYY-HPFUg/edit'"
              >
                Mobile UI
              </button>
              <button
                class="btn btn-color-2 project-btn"
                onclick="location.href='https://www.canva.com/design/DAFzHAgiFi0/7eDVFoN5awzHT-KM8mCQDQ/edit'"
              >
                Website UI
              </button>
            </div>
          </div>
          <div class="details-container color-container">
            <div class="article-container">
              <img
                src="Calculator.JPG"
                alt="Project 2"
                class="project-img"
              />
            </div>
            <h2 class="experience-sub-title project-title">Web Calculator</h2>
            <div class="btn-container">
              <button
                class="btn btn-color-2 project-btn"
                onclick="location.href='https://github.com/Shogun013/Calculator'"
              >
                Github
            </button>
            </div>
          </div>
          <div class="details-container color-container">
            <div class="article-container">
              <img
                src="Mobile.JPG"
                alt="Project 3"
                class="project-img"
              />
            </div>
            <h2 class="experience-sub-title project-title">Basic Mobile App</h2>
            <div class="btn-container">
              <button
                class="btn btn-color-2 project-btn"
                onclick="location.href='Project.pdf'"
              >
                Download PDF
              </button>
            </div>
          </div>
        </div>
      </div>
    
    </section>
    <section id="contact">
      <p class="section__text__p1">Connect Further</p>
      <h1 class="title">Contact Me</h1>
      <div class="contact-info-upper-container">
        <div class="contact-info-container">
          <img
            src="gmail.png"
            alt="Email icon"
            class="icon contact-icon email-icon"
          />
          <p><a href="mailto:llorenzlazaro01@gmail.com">llorenzlazaro01@gmail.com</a></p>
        </div>
        <div class="contact-info-container">
          <img
            src="linkedin.png"
            alt="LinkedIn icon"
            class="icon contact-icon"
          />
          <p><a href="https://www.linkedin.com/in/llorenz-lazaro-0548b5286/">LinkedIn</a></p>
        </div>
        <div class="contact-info-container">
            <img
              src="facebook.png"
              alt="facebook icon"
              class="icon contact-icon"
            />
            <p><a href="https://www.facebook.com/llorenz.lazaro/">Facebook</a></p>
          </div>
          <div class="contact-info-container">
            <img
              src="github.png"
              alt="facebook icon"
              class="icon contact-icon"
            />
            <p><a href="https://github.com/Shogun013">Github</a></p>
          </div>
      </div>
    </section>
    <footer>
      <nav>
        <div class="nav-links-container">
          <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#montage">Montage</a></li> 
            <li><a href="#experience">Experience</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="login.php">Feedback</a></li>
          </ul>
        </div>
      </nav>
      <p>Copyright &#169; 2024 Llorenz Lazaro. All Rights Reserved.</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>