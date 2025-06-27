let bannerIndex = 0;
const bannerImages = [
    'img/banner.jpg',
    'img/banner2.jpg',
    'img/banner3.jpg',
];

const bannerImgElement = document.querySelector('.banner-image');
const bannerPrevButton = document.querySelector('.banner .prev');
const bannerNextButton = document.querySelector('.banner .next');

function updateBannerImage() {
    bannerImgElement.src = bannerImages[bannerIndex];
}

bannerPrevButton.addEventListener('click', () => {
    bannerIndex = (bannerIndex - 1 + bannerImages.length) % bannerImages.length;
    updateBannerImage();
});

bannerNextButton.addEventListener('click', () => {
    bannerIndex = (bannerIndex + 1) % bannerImages.length;
    updateBannerImage();
});

updateBannerImage();