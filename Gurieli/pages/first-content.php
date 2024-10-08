<?php
    $root = '/GURIELI/'; 
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="slider-container">
  <div class="left-bar">
    <div class="bullets">
      <div class="bullet"></div>
      <div class="bullet"></div>
      <div class="bullet"></div>
      <div class="bullet"></div>
    </div>
  </div>

  <div class="content-slider" style="background-image: url(<?= $root?>/assets/imgs/agriculture.jpg)">
    <div class="content active">
      <h1 class="title">Title 1</h1>
      <p class="description">Description for content 1</p>
      <button class="action-btn">Button 1</button>
    </div>

    <div class="content">
      <h1 class="title">Title 2</h1>
      <p class="description">Description for content 2</p>
      <button class="action-btn">Button 2</button>
    </div>

    <div class="content">
      <h1 class="title">Title 3</h1>
      <p class="description">Description for content 3</p>
      <button class="action-btn">Button 3</button>
    </div>

    <div class="content">
      <h1 class="title">Title 4</h1>
      <p class="description">Description for content 4</p>
      <button class="action-btn">Button 4</button>
    </div>
  </div>

  <div class="right-bar">
    <div class="social-icons">
      <a href="" target="_blank" class="icon"><img src="assets/imgs/icons/facebook.png" alt=""></a>
      <a href="" target="_blank" class="icon"><img src="assets/imgs/icons/instagram.png" alt=""></a>
      <a href="" target="_blank" class="icon"><img src="assets/imgs/icons/linkedin.png" alt=""></a>
      <a href="" target="_blank" class="icon"><img src="assets/imgs/icons/youtube.png" alt=""></a>
    </div>
  </div>
</div>

<style>
.content-slider {
 background-position: center center;
  background-size: cover;
  position:relative;
}
.content-slider::before {
  content: "";
  left: 0;
  top: 0;
  background: rgba(0, 0, 0, 0.4);  
  width: 100%;
  height: 100%;

}
.slider-container {
  position: absolute;
  width: 100%;
  height: 100vh;
  left: 0;
  top: 0;
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: space-between;
  z-index: -1;
}

.left-bar, .right-bar {
  position: absolute;
  top: 0;
  width: 90px;
  height: 100%;
  display: flex;
  align-items: center;
  background: transparent;
  justify-content: center;
  z-index: 1;
}

.left-bar {
  left: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.right-bar {
  right: 0;
}

.bullets, .social-icons {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.bullet, .icon {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  transition: all 0.3s ease;
}

.bullet.active {
  background-color: #ff6347;
  padding: 2px;
}

.icon {
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  font-size: 1.2rem;
}

.content-slider {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

.content {
  position: absolute;
  opacity: 0;
  visibility: hidden;
  text-align: center;
  transition: opacity 1s ease-in-out, visibility 0s 1s;
}

.content.active {
  opacity: 1;
  visibility: visible;
  transition: opacity 2s ease-in-out, visibility 0s 0s;
}

.title {
  font-size: 2rem;
  color: #fff;
}

.description {
  font-size: 1.2rem;
  margin-top: 10px;
  color: #ddd;
}

.action-btn {
  margin-top: 20px;
  padding: 10px 20px;
  background-color: #ff6347;
  color: #fff;
  border: none;
  cursor: pointer;
  font-size: 1rem;
}
</style>

<script>
const contents = document.querySelectorAll('.content');
const bullets = document.querySelectorAll('.bullet');
let currentIndex = 0;
let sliderInterval;

function showContent(index) {
  contents.forEach((content, i) => {
    content.classList.remove('active');
    bullets[i].classList.remove('active');
  });

  setTimeout(() => {
    contents[index].classList.add('active');
    bullets[index].classList.add('active');
  }, 0);
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % contents.length;
  showContent(currentIndex);
}

function startSliderInterval() {
  sliderInterval = setInterval(nextSlide, 4000);
}

function resetSliderInterval() {
  clearInterval(sliderInterval);
  startSliderInterval();
}

bullets.forEach((bullet, index) => {
  bullet.addEventListener('click', () => {
    currentIndex = index;
    showContent(index);
    resetSliderInterval();
  });
});

startSliderInterval();
</script>
