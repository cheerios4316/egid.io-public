import { Component } from "dumpsterfire/Component";
import $ from "jquery";

import hljs from "highlight.js";

import "highlight.js/styles/github-dark.css";

export class MarkDownComponent extends Component {
  protected codeBlocks: any;
  protected collapseButton: HTMLElement | null = null;

  protected collapseHeightValue: number = 5;
  protected collapseHeight: string = "5rem";

  protected setData() {
    this.codeBlocks = this.$element.find("pre");
    this.collapseButton = this.createToggleButton();

    this.collapseHeightValue = 5;
    this.collapseHeight = this.collapseHeightValue + "rem";
  }

  protected bindEvents() {
    hljs.highlightAll();

    [...this.codeBlocks].forEach((block: HTMLElement, id: number) => {
      this.prepareBlock(block, id);
    });
  }

  protected prepareBlock(block: HTMLElement, id: number) {
    block.classList.add("relative");

    const button: HTMLElement | null = this.collapseButton
      ? ($(this.collapseButton).clone()[0] as HTMLElement)
      : null;

    const $block = $(block);

    let shouldHaveButton = false;

    if (this.collapseHeightValue && $block) {
      const fontSize = getComputedStyle(document.documentElement).fontSize;
      shouldHaveButton =
        ($block?.height() ?? 0) >=
        parseFloat(fontSize) * this.collapseHeightValue;
    }

    const open = !shouldHaveButton || id == 0;
    $block.data("open", open);
    if (button) button.textContent = open ? "Collapse" : "Expand";

    if (!open) {
      block.classList.add("collapsed");
      block.style.height = this.collapseHeight;
    }

    if (button) $(button).on("click", () => this.toggleBlock(block, button));

    const wrapper = document.createElement("div");
    wrapper.classList.add("relative");
    const parent = block.parentNode;
    if (parent) {
        parent.insertBefore(wrapper, block);
    }

    if (shouldHaveButton && button) {
        wrapper.appendChild(button);
    }

    wrapper.appendChild(block);
  }

  public toggleBlock(block: HTMLElement, button: HTMLElement): void {
    const $block = $(block);
    const isOpen = !!$block.data("open");

    $block.css("overflow", "hidden");

    block.classList.toggle("collapsed");

    const fullHeight = block.scrollHeight;
    const startHeight = $block.height() + "px";
    const targetHeight = isOpen ? this.collapseHeight : fullHeight + "px";

    $block
      .stop(true, false) // cancel any running animation
      .css("height", startHeight) // lock start
      .animate({ height: targetHeight }, { duration: 10 });

    $block.data("open", !isOpen);

    $block.css("overflow",  "auto")

    button.textContent = isOpen ? "Expand" : "Collapse";
  }

  protected createToggleButton(): HTMLElement {
    const span: HTMLElement = document.createElement("span");

    const buttonClasses = [
      "text-neutral-600",
      "hover:text-neutral-400",
      "toggle-button",
      "transition-all",
      "p-1",
      "md:p-2",
      "py-1",
      "absolute",
      "top-4",
      "right-4",
      "bg-neutral-900",
      "cursor-pointer",
      "z-998",
      "text-sm",
      "md:text-md",
    ];

    span.classList.add(...buttonClasses);

    return span;
  }
}

window.MarkDownComponent = MarkDownComponent;
