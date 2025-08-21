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
            e.stopPropagation();
            this.sectionMenu.slideToggle(200, function () {
            });
        })

        $(window).on('scroll', () => {
            const isMobile = this.checkMobile();

            if (!isMobile) {
                return
            }

            if (this.sectionMenu.is(':visible')) {
                this.sectionMenu.slideUp(200);
            }
        });

        $(window).on('click', (e) => {
            if(!this.sectionMenu.is(':visible')) {
                return;
            }

            if(
                $(e.target).hasClass("section-menu") ||
                $(e.target).hasClass("menu-button") ||
                $(e.target).hasClass("sidebar-section-component")
            ) {
                return;
            }

            if(
                this.checkMobile()
            ) {
                e.preventDefault();
                e.stopPropagation();

                this.sectionMenu.slideUp(200);
            }
        })
    }

    protected checkMobile(): boolean {
        return window.innerWidth <= 768;
    }
}

window.SidebarComponent = SidebarComponent;
