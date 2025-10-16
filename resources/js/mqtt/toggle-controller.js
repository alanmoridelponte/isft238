export class ToggleController {
    constructor(containerId, options = {}) {
        this.container = document.getElementById(containerId);
        if (!this.container)
            throw new Error(
                `Contenedor con ID "${containerId}" no encontrado.`
            );

        this.state = options.initialState || false; // false = apagado, true = encendido
        this.onChange = options.onChange || (() => {});
        this.inputId = containerId + "-input";
        this.text = options.text || "";

        this.render();
        this.attachEvents();
    }

    render() {
        this.container.innerHTML = `
            <h5 class="font-semibold text-lg">${this.text}</h5>&nbsp;&nbsp;
            <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear
                ${this.state ? "bg-green-400" : "bg-gray-400"}">
                <input type="checkbox" id="${this.inputId}" class="appearance-none w-full h-full cursor-pointer"
                    ${this.state ? "checked" : ""}>
                <label for="${this.inputId}" class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full
                    transition transform duration-150 ease-linear pointer-events-none
                    ${
                        this.state
                            ? "translate-x-full border-green-400"
                            : "translate-x-0 border-gray-400"
                    }">
                </label>
            </div>
        `;
        this.input = this.container.querySelector("input");
        this.label = this.container.querySelector("label");
        this.outer = this.container.querySelector("div");
    }

    attachEvents() {
        this.input.addEventListener("change", () => this.toggle());
    }

    toggle() {
        this.state = !this.state;
        this.update();
        this.onChange(this.state);
    }

    update() {
        this.outer.className = `relative rounded-full w-12 h-6 transition duration-200 ease-linear
            ${this.state ? "bg-green-400" : "bg-gray-400"}`;
        this.label.className = `absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full
            transition transform duration-150 ease-linear cursor-pointer
            ${
                this.state
                    ? "translate-x-full border-green-400"
                    : "translate-x-0 border-gray-400"
            }`;
        this.input.checked = this.state;
    }

    get value() {
        return this.state;
    }

    set value(newState) {
        this.state = Boolean(newState);
        this.update();
    }
}

window.ToggleController = ToggleController;
