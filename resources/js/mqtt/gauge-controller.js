class GaugeController {
    constructor(containerId, config = {}) {
        this.container = document.getElementById(containerId);
        if (!this.container)
            throw new Error(
                `Contenedor con ID "${containerId}" no encontrado.`
            );

        this.outerRings = config.outerRings || [];
        this.currentPercentage = config.initialPercentage || 0;
        this.gaugeColor = config.gaugeColor || "#3b82f6";
        this.gaugeBgColor = config.gaugeBgColor || "#dbeafe";
        this.borderColor = config.borderColor || "#475569";
        this.centerColor = config.centerColor || "#f1f5f9";
        this.gaugeText = config.text || "";

        this.init();
    }

    init() {
        this.createGaugeHTML();
        this.renderOuterRings();
        this.setPercentage(this.currentPercentage);
    }

    createGaugeHTML() {
        this.container.innerHTML = `
          <div class="gauge-container" style="position: relative; display: flex; aspect-ratio: 2 / 1; align-items: center; justify-content: center; overflow: hidden; border-top-left-radius: 9999px; border-top-right-radius: 9999px;">
            <div id="outer-rings" style="position: absolute; top: 0; width: 100%; height: 100%;"></div>
            <div class="gauge-inner" style="position: absolute; inset: 0.5rem; display: flex; aspect-ratio: 2 / 1; align-items: center; justify-content: center; overflow: hidden; border-top-left-radius: 9999px; border-top-right-radius: 9999px; border: 4px solid ${this.borderColor}; border-bottom: none;">
              <div class="gauge-bg" style="position: absolute; aspect-ratio: 1 / 1; top: 0; width: 100%; background: ${this.gaugeColor}; z-index: 10;"></div>
              <div class="gauge-fill" style="position: absolute;bottom: 0px;left: 0px;width: 100%;height: 100%;background: ${this.gaugeBgColor};transform-origin: center bottom;transition: transform 0.5s; z-index: 11;"></div>
              <div class="center-circle" style="position: absolute; top: 15%; display: flex; aspect-ratio: 1 / 1; width: 85%; justify-content: center; border-radius: 9999px; background: ${this.centerColor}; z-index: 12;"></div>
              <div class="gauge-value text-gray-700" style="position: absolute; bottom: 25%; width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; text-align: center; font-size: 3.5rem; font-weight: bold; z-index: 12;">0%</div>
              <div class="gauge-text text-gray-700" style="position: absolute; bottom: 5%; width: 100%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; text-align: center; font-size: 2rem; font-weight: bold; z-index: 12;">${this.gaugeText}</div>
            </div>
          </div>
        `;
    }

    percentToRotation(value) {
        // Convertir porcentaje a grados (0% = 0°, 100% = 180°)
        return (value / 100) * 180;
    }

    setPercentage(value) {
        this.currentPercentage = Math.min(Math.max(value, 0), 100);
        const rotation = this.percentToRotation(this.currentPercentage);

        const gaugeFill = this.container.querySelector(".gauge-fill");
        const gaugeValue = this.container.querySelector(".gauge-value");

        if (gaugeFill && gaugeValue) {
            // Rotar el fill para mostrar el porcentaje
            gaugeFill.style.transform = `rotate(${rotation}deg)`;
            gaugeValue.textContent = `${Math.round(this.currentPercentage)}%`;
        }
    }

    addOuterRing(color = "#3b82f6", percent = 50) {
        this.outerRings.push({
            id: Date.now(),
            color,
            percent: Math.min(Math.max(percent, 0), 100),
        });
        this.renderOuterRings();
    }

    removeOuterRing(id) {
        this.outerRings = this.outerRings.filter((ring) => ring.id !== id);
        this.renderOuterRings();
    }

    renderOuterRings() {
        const container = this.container.querySelector("#outer-rings");
        if (!container) return;
        container.innerHTML = "";

        // Ordenar de menor a mayor porcentaje para el z-index
        this.outerRings
            .sort((a, b) => a.percent - b.percent)
            .forEach((ring, index) => {
                const rotation = this.percentToRotation(ring.percent);
                const el = document.createElement("div");

                el.style.cssText = `
                    position: absolute;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    transform-origin: bottom center;
                    background: ${ring.color};
                    clip-path: polygon(0% 100%, 50% 100%, 50% 0%, 0% 0%);
                    z-index: ${5 + index};
                `;

                // Aplicar la rotación después de un pequeño delay para asegurar que el DOM esté listo
                setTimeout(() => {
                    el.style.transform = `rotate(${rotation}deg)`;
                }, 10);

                container.appendChild(el);
            });
    }

    // Métodos para actualizar colores
    updateGaugeColor(newColor) {
        this.gaugeColor = newColor;
        const gaugeFill = this.container.querySelector(".gauge-fill");
        if (gaugeFill) {
            gaugeFill.style.background = newColor;
        }
    }

    updateBackgroundColor(newColor) {
        this.gaugeBgColor = newColor;
        const gaugeBg = this.container.querySelector(".gauge-bg");
        if (gaugeBg) {
            gaugeBg.style.background = newColor;
        }
    }

    updateBorderColor(newColor) {
        this.borderColor = newColor;
        const gaugeInner = this.container.querySelector(".gauge-inner");
        if (gaugeInner) {
            gaugeInner.style.borderColor = newColor;
        }
    }

    updateCenterColor(newColor) {
        this.centerColor = newColor;
        const centerCircle = this.container.querySelector(".center-circle");
        if (centerCircle) {
            centerCircle.style.background = newColor;
        }
    }

    // Método para actualizar todos los colores a la vez
    updateColors(config) {
        if (config.gaugeColor) this.updateGaugeColor(config.gaugeColor);
        if (config.gaugeBgColor)
            this.updateBackgroundColor(config.gaugeBgColor);
        if (config.borderColor) this.updateBorderColor(config.borderColor);
        if (config.centerColor) this.updateCenterColor(config.centerColor);
    }
}

window.GaugeController = GaugeController;

class Helpers {
    static ifTopic(expectedTopic, callback) {
        return (topic, payload) => {
            if (topic === expectedTopic) {
                callback(payload);
            }
        };
    }

    static percentInRange(percentage, min, max) {
        return Math.min(Math.max((percentage / max) * max, min), max);
    }

    static debounce(callback, wait) {
        let timeoutId = null;
        return (...args) => {
            window.clearTimeout(timeoutId);
            timeoutId = window.setTimeout(() => {
                callback(...args);
            }, wait);
        };
    }
}

window.Helpers = Helpers;
