(function () {
  function onReady(callback) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", callback, { once: true });
      return;
    }

    callback();
  }

  function getSiteBasePath() {
    var base = document.querySelector("base[href*='/wp-content/themes/']");
    if (!base) {
      return "/";
    }

    try {
      var baseUrl = new URL(base.href, window.location.href);
      return baseUrl.pathname.split("/wp-content/")[0].replace(/\/?$/, "/");
    } catch (error) {
      return "/";
    }
  }

  function rewriteLegacyUrls(container) {
    var siteBasePath = getSiteBasePath();

    container.querySelectorAll("a[href^='/'], img[src^='/']").forEach(function (element) {
      var attr = element.tagName === "IMG" ? "src" : "href";
      var value = element.getAttribute(attr);

      if (!value || value.indexOf(siteBasePath) === 0 || value.indexOf("//") === 0) {
        return;
      }

      element.setAttribute(attr, siteBasePath + value.replace(/^\/+/, ""));
    });
  }

  function setOptionAvailability(select, groupValue) {
    Array.prototype.forEach.call(select.options, function (option) {
      var optionGroup = option.getAttribute("data-group");
      var isPlaceholder = option.value === "0" || optionGroup === "SHOW";
      var isAvailable = isPlaceholder || !groupValue || groupValue === "0" || optionGroup === groupValue;

      option.hidden = !isAvailable;
      option.disabled = !isAvailable;
    });

    if (select.selectedOptions.length && select.selectedOptions[0].disabled) {
      select.value = "0";
    }
  }

  function enhanceFinder(finder) {
    var groupSelect = finder.querySelector("#groups");
    var modelSelect = finder.querySelector("#sub_groups");
    var resultsContainer = finder.querySelector("#results-container");
    var isTyreFinder = window.location.pathname.indexOf("/tyre-product-finder") !== -1;

    if (!groupSelect || !modelSelect || !resultsContainer) {
      return;
    }

    var results = Array.prototype.slice.call(resultsContainer.children).filter(function (child) {
      return child.tagName === "DIV";
    });
    var status = document.createElement("p");

    status.className = "product-finder-status";
    status.setAttribute("role", "status");
    status.setAttribute("aria-live", "polite");
    resultsContainer.insertAdjacentElement("beforebegin", status);

    groupSelect.setAttribute("aria-label", "Select manufacturer");
    modelSelect.setAttribute("aria-label", "Select model");
    resultsContainer.setAttribute("aria-live", "polite");

    rewriteLegacyUrls(finder);
    finder.classList.add("product-finder-ready");
    finder.classList.toggle("product-finder--tyre", isTyreFinder);

    function updateResults() {
      var groupValue = groupSelect.value;
      var modelValue = modelSelect.value;
      var selectedGroupChanged = groupSelect.dataset.previousValue !== groupValue;

      setOptionAvailability(modelSelect, groupValue);

      if (selectedGroupChanged) {
        modelSelect.value = "0";
        modelValue = "0";
      }

      groupSelect.dataset.previousValue = groupValue;

      var hasCompleteSelection = groupValue !== "0" && modelValue !== "0";
      var matchCount = 0;

      results.forEach(function (result) {
        var isMatch = hasCompleteSelection &&
          result.classList.contains(groupValue) &&
          result.classList.contains(modelValue);

        result.hidden = !isMatch;
        result.setAttribute("aria-hidden", isMatch ? "false" : "true");

        if (isMatch) {
          matchCount += 1;
        }
      });

      if (groupValue === "0") {
        status.textContent = "Select a manufacturer to see compatible models.";
      } else if (modelSelect.value === "0") {
        status.textContent = isTyreFinder
          ? "Select a model to view the recommended tyre fitment."
          : "Select a model to view the recommended BOLT battery.";
      } else if (matchCount === 0) {
        status.textContent = isTyreFinder
          ? "No matching tyre fitment found for this selection."
          : "No matching battery found for this selection.";
      } else {
        status.textContent = isTyreFinder
          ? (matchCount === 1 ? "1 recommended tyre fitment found." : matchCount + " recommended tyre fitments found.")
          : (matchCount === 1 ? "1 recommended battery found." : matchCount + " recommended batteries found.");
      }

      resultsContainer.classList.toggle("has-results", matchCount > 0);
    }

    groupSelect.addEventListener("change", updateResults);
    modelSelect.addEventListener("change", updateResults);
    updateResults();
  }

  onReady(function () {
    document.querySelectorAll(".prodfinder-bb").forEach(enhanceFinder);
  });
})();
