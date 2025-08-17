import { Component } from "dumpsterfire/Component";
import $ from "jquery";
import hljs from "highlight.js";
import "highlight.js/styles/github-dark.css";

export class MarkDownComponent extends Component {
    protected bindEvents() {
        hljs.highlightAll();
    }
}

window.MarkDownComponent = MarkDownComponent;
