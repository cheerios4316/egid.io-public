import {Component} from "dumpsterfire/Component";
import $ from "jquery";

export class SidebarComponent extends Component {

    protected sectionMenu: any;
    protected menuButton: any;

    protected isMobile: boolean = false;

    protected setData() {
        this.sectionMenu = this.$element.find('.section-menu');
        this.menuButton = this.$element.find('.menu-button');
    }

    protected bindEvents() {

        this.checkMobile();

        $(window).on('resize', () => {
            const prev = this.isMobile;

            this.isMobile = this.checkMobile();

            if(!this.isMobile && !this.sectionMenu.is(':visible')) {
                this.sectionMenu.slideDown(200);
            }

            if(this.isMobile && !prev) {
                this.sectionMenu.hide();
            }
        })

        this.menuButton.on('click', (e: any) => {
            this.sectionMenu.slideToggle(200, function () {
            });
        })

        $(window).on('scroll', () => {
            if (!this.isMobile) {
                return
            }

            if (this.sectionMenu.is(':visible')) {
                this.sectionMenu.slideUp(200);
            }
        });
    }

    protected checkMobile(): boolean {
        return window.innerWidth <= 768;
    }
}

window.SidebarComponent = SidebarComponent;
