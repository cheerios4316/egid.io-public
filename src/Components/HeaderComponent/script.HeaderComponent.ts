import { Component } from "dumpsterfire/Component";

export class HeaderComponent extends Component {
  protected titleElement: any;
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
  }

  protected bindEvents(): void {
    console.log(this.$element.data())
    this.animate && this.animateTitle();
  }

  protected animateTitle(): void {
    const letterTimegap = 200;
    const randAmount = 3;
    const title = this.title;
    const charList = this.charList;

    this.titleElement.text("$");

    let mainCounter = 0;
    let counter = 0;
    let currentVal = "";

    const interval = setInterval(() => {
      if (mainCounter >= title.length) {
        clearInterval(interval);
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

  protected randomChar(list: string): string {
    const randIndex = Math.floor(Math.random() * list.length);
    return list[randIndex];
  }

  protected shuffleString(elem: string): string {
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
