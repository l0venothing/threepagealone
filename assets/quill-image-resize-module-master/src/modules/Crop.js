import { BaseModule } from './BaseModule';

export class Crop extends BaseModule {
    onCreate = () => {
        this.timecrop = 0;
        this.originImg = this.img.cloneNode();
        this.originMime = this.img.src.match(/image\/[^;]+/i)[0];
        console.log("mime", this.originMime);
    }
    onUpdate = () => {
        window.cancelAnimationFrame(this.timecrop);
        this.timecrop = window.requestAnimationFrame(() => {
            if (typeof this.img != 'undefined') {
                let cv = document.createElement('CANVAS'), ctx;
                if (this.img.offsetWidth < this.originImg.naturalWidth) {
                    cv.width = this.img.offsetWidth;
                    cv.height = this.img.offsetHeight;
                } else {
                    cv.width = this.originImg.naturalWidth;
                    cv.height = this.originImg.naturalHeight;
                }
                ctx = cv.getContext("2d");
                ctx.drawImage(this.originImg, 0, 0, this.originImg.naturalWidth, this.originImg.naturalHeight, 0, 0, cv.width, cv.height);
                this.img.src = cv.toDataURL(this.originMime);
            }
        });
    };
}
