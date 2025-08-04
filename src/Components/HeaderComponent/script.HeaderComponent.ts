import { Component } from "dumpsterfire/Component";
import $ from "jquery";

export class HeaderComponent extends Component {
  protected titleElement: any;
  protected blinkerElement: any;

  protected title: string = "";
  protected animate: boolean = false;

  protected charList: string = "";

  onClick(e: JQuery.ClickEvent) {}

  protected setData(): void {
    this.titleElement = this.$element.find(".header-component__title");
    this.title = this.titleElement.text();
    this.charList = this.shuffleString(
      "abcdefghijklmnopqrstuvwxyz.!-@#\\/^*_&%$;"
    );
    this.animate = this.$element.data("animate");
    this.blinkerElement = this.$element.find(".blinker-element");
  }

  protected bindEvents(): void {
    if (this.animate) {
      $(this.blinkerElement).css("visibility", "hidden");
      this.animateTitle();
    }
  }

  protected animateTitle(): void {
    const letterTimegap = 200;
    const randAmount = 5;
    const title = this.title;
    const charList = this.charList;

    this.titleElement.text("$");

    let mainCounter = 0;
    let counter = 0;
    let currentVal = "";

    const interval = setInterval(() => {
      if (mainCounter >= title.length) {
        clearInterval(interval);
        this.setBlinker();
        return;
      }

      const spaceRemainder = "\u00A0".repeat(title.length - (mainCounter + 1));

      if (counter < randAmount) {
        this.titleElement.text(
          currentVal + this.randomChar(charList) + spaceRemainder
        );
        counter++;
      } else {
        const nextLetter = title[mainCounter];
        currentVal += nextLetter;
        this.titleElement.text(currentVal + spaceRemainder);
        mainCounter++;
        counter = 0;
      }
    }, Math.floor(letterTimegap / randAmount));
  }

  protected setBlinker() {
    const timer = 2000;

    setTimeout(() => {
      this.toggleBlinker("visible");
    }, timer / 4);

    const blinker = setInterval(() => {
      this.toggleBlinker("visible");
      setTimeout(() => {
        this.toggleBlinker("hidden");
      }, Math.floor(timer / 4));
    }, timer);
  }

  protected randomChar(list: string): string {
    const randIndex = Math.floor(Math.random() * list.length);
    return list[randIndex];
  }

  protected toggleBlinker(visibility: "visible" | "hidden") {
    $(this.blinkerElement).css("visibility", visibility);
  }

  protected shuffleString(elem: string): string {
    // non linear, ugly, inefficient
    for (let i = 0; i < 3; i++) {
      elem = elem
        .split("")
        .sort(() => Math.random() - 0.5)
        .join("");
    }

    return elem;
  }
}

window.HeaderComponent = HeaderComponent;
