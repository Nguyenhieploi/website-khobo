// External Dependencies
import React, { Component } from "react";
import { applyBgCss, Button, Description, Icon, Image, Title } from "./common";
import "./get_responsive_css";
// Internal Dependencies
import "./style.css";

class NextImageEffect extends Component {
  static slug = "dnxtiel_next_image_effect";

  static css(props) {
    let css = [];

    css.push([
      {
        selector: "%%order_class%%",
        declaration: "text-align:unset",
      },
    ]);

    /**
     * Custom Padding Margin Output
     *
     */
    if ("off" !== props.dnxtiel_use_hover_image) {
      if ("" !== props.dnxtiel_hvr_image_margin) {
        css.push(
          window.DndhCommon.get_responsive_css(
            props,
            "dnxtiel_hvr_image_margin",
            "%%order_class%% .dnxtiel-hover-image",
            "margin"
          )
        );
      }

      if ("" !== props.dnxtiel_hvr_image_padding) {
        css.push(
          window.DndhCommon.get_responsive_css(
            props,
            "dnxtiel_hvr_image_padding",
            "%%order_class%% .dnxtiel-hover-image",
            "padding"
          )
        );
      }
    }

    // Button
    if ("off" !== props.dnxtiel_use_button) {
      if ("" !== props.dnxtiel_button_margin) {
        css.push(
          window.DndhCommon.get_responsive_css(
            props,
            "dnxtiel_button_margin",
            "%%order_class%% .dnxtiel-hover-button",
            "margin"
          )
        );
      }

      if ("" !== props.dnxtiel_button_padding) {
        css.push(
          window.DndhCommon.get_responsive_css(
            props,
            "dnxtiel_button_padding",
            "%%order_class%% .dnxtiel-hover-button",
            "padding"
          )
        );
      }
    }
    // Button

    // Icon
    if ("off" !== props.dnxtiel_use_icon) {
      if ("" !== props.dnxtiel_icon_margin) {
        css.push(
          window.DndhCommon.get_responsive_css(
            props,
            "dnxtiel_icon_margin",
            "%%order_class%% .dnxtiel-hover-icon",
            "margin"
          )
        );
      }

      if ("" !== props.dnxtiel_icon_padding) {
        css.push(
          window.DndhCommon.get_responsive_css(
            props,
            "dnxtiel_icon_padding",
            "%%order_class%% .dnxtiel-hover-icon",
            "padding"
          )
        );
      }
    }
    // Icon

    if ("" !== props.dnxtiel_heading_margin) {
      css.push(
        window.DndhCommon.get_responsive_css(
          props,
          "dnxtiel_heading_margin",
          "%%order_class%% .dnxtiel-heading",
          "margin"
        )
      );
    }

    if ("" !== props.dnxtiel_heading_padding) {
      css.push(
        window.DndhCommon.get_responsive_css(
          props,
          "dnxtiel_heading_padding",
          "%%order_class%% .dnxtiel-heading",
          "padding"
        )
      );
    }

    if ("" !== props.dnxtiel_description_margin) {
      css.push(
        window.DndhCommon.get_responsive_css(
          props,
          "dnxtiel_description_margin",
          "%%order_class%% .dnxtiel-description",
          "margin"
        )
      );
    }

    if ("" !== props.dnxtiel_description_padding) {
      css.push(
        window.DndhCommon.get_responsive_css(
          props,
          "dnxtiel_description_padding",
          "%%order_class%% .dnxtiel-description",
          "padding"
        )
      );
    }

    if ("" !== props.dnxtiel_caption_padding) {
      css.push(
        window.DndhCommon.get_responsive_css(
          props,
          "dnxtiel_caption_margin",
          "%%order_class%% figcaption",
          "margin"
        )
      );
    }

    if ("" !== props.dnxtiel_caption_padding) {
      css.push(
        window.DndhCommon.get_responsive_css(
          props,
          "dnxtiel_caption_padding",
          "%%order_class%% figcaption",
          "padding"
        )
      );
    }

    if ("off" !== props.dnxtiel_hover_bg_show_hide) {
      if ("on|tablet" === props.dnxtiel_hover_bg_last_edited) {
        css.push([
          {
            selector:
              "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
            declaration: `background-color: ${props.dnxtiel_hover_bg_tablet};`,
            device: "tablet",
          },
        ]);
      } else if ("on|phone" === props.dnxtiel_hover_bg_last_edited) {
        css.push([
          {
            selector:
              "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
            declaration: `background-color: ${props.dnxtiel_hover_bg_phone};`,
            device: "phone",
          },
        ]);
      } else {
        css.push([
          {
            selector:
              "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
            declaration: `background-color: ${props.dnxtiel_hover_bg};`,
          },
        ]);
      }
    }

    // Hover gradient
    if ("off" !== props.dnxtiel_hover_gradient_show_hide) {
      let gradient_direction =
        props.dnxtiel_hover_gradient_type === "linear-gradient"
          ? props.dnxtiel_hover_gradient_type_linear_direction
          : props.dnxtiel_hover_gradient_type_radial_direction;
      let color_one = props.dnxtiel_hover_gradient_color_one;
      let color_two = props.dnxtiel_hover_gradient_color_two;
      let gradient_start = props.dnxtiel_hover_gradient_start_position;
      let gradient_end = props.dnxtiel_hover_gradient_end_position;

      let gradient = `background: ${props.dnxtiel_hover_gradient_type}(${gradient_direction}, ${color_one} ${gradient_start}, ${color_two} ${gradient_end});`;
      css.push([
        {
          selector:
            "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
          declaration: gradient,
        },
      ]);
    }

    // Hover image width
    if ("off" !== props.dnxtiel_use_hover_image) {
      css.push([
        {
          selector: "%%order_class%% .dnxtiel-hover-image",
          declaration: `width: ${props.dnxtiel_hover_image_width};`,
        },
      ]);

      if ("on|tablet" === props.dnxtiel_hover_image_width_last_edited) {
        css.push([
          {
            selector: "%%order_class%% .dnxtiel-hover-image",
            declaration: `width: ${props.dnxtiel_hover_image_width_tablet};`,
            device: "tablet",
          },
        ]);
      } else if ("on|phone" === props.dnxtiel_hover_image_width_last_edited) {
        css.push([
          {
            selector: "%%order_class%% .dnxtiel-hover-image",
            declaration: `width: ${props.dnxtiel_hover_image_width_phone};`,
            device: "phone",
          },
        ]);
      } else if (
        "on|hover" === props.dnxtiel_hover_image_width__hover_enabled
      ) {
        css.push([
          {
            selector: `%%order_class%% .dnxtiel-hover-image:hover`,
            declaration: `width: ${props.dnxtiel_hover_image_width__hover};`,
          },
        ]);
      }
    }
    // Hover image width end

    // Icon size
    if ("off" !== props.dnxtiel_use_icon) {
      css.push([
        {
          selector: "%%order_class%% .dnxtiel-hover-icon",
          declaration: `font-size: ${props.dnxtiel_icon_size};`,
        },
      ]);

      if ("on|tablet" === props.dnxtiel_icon_size_last_edited) {
        css.push([
          {
            selector: "%%order_class%% .dnxtiel-hover-icon",
            declaration: `font-size: ${props.dnxtiel_icon_size_tablet};`,
            device: "tablet",
          },
        ]);
      } else if ("on|phone" === props.dnxtiel_icon_size_last_edited) {
        css.push([
          {
            selector: "%%order_class%% .dnxtiel-hover-icon",
            declaration: `font-size: ${props.dnxtiel_icon_size_phone};`,
            device: "phone",
          },
        ]);
      }
    }
    // Icon size end

    // Button Background color
    if ("off" !== props.dnxtiel_use_button) {
      const moduleBgCss = [
        // Button background color
        {
          slug: "button_bg_color",
          use_color_gradient_slug: props.button_bg_use_color_gradient,
          gradient: {
            type: "button_bg_color_gradient_type",
            direction: "button_bg_color_gradient_direction",
            radial: "button_bg_color_gradient_direction_radial",
            start: "button_bg_color_gradient_start",
            end: "button_bg_color_gradient_end",
            start_position: "button_bg_color_gradient_start_position",
            end_position: "button_bg_color_gradient_end_position",
            overlays_image: "button_bg_color_gradient_overlays_image",
          },
          css_property: {
            desktop: "%%order_class%% .dnxtiel-hover-button",
            hover: "%%order_class%% .dnxtiel-hover-button:hover",
          },
        },
        // Image / Icon Background
        {
          slug: "icon_bg_color",
          use_color_gradient_slug: props.icon_bg_use_color_gradient,
          gradient: {
            type: "icon_bg_color_gradient_type",
            direction: "icon_bg_color_gradient_direction",
            radial: "icon_bg_color_gradient_direction_radial",
            start: "icon_bg_color_gradient_start",
            end: "icon_bg_color_gradient_end",
            start_position: "icon_bg_color_gradient_start_position",
            end_position: "icon_bg_color_gradient_end_position",
            overlays_image: "icon_bg_color_gradient_overlays_image",
          },
          css_property: {
            desktop:
              "%%order_class%% .dnxtiel-hover-image, %%order_class%% .dnxtiel-hover-icon",
            hover:
              "%%order_class%% .dnxtiel-hover-image:hover,%%order_class%% .dnxtiel-hover-icon:hover",
          },
        },
      ];

      moduleBgCss.forEach((element) => applyBgCss(css, props, element));
    }
    // Button Background color end

    return css;
  }

  getAlignment = (props, slug) => {
    let alignment = props[slug] ? `${slug}_` + props[slug] : "";
    let alignment_tablet = props[`${slug}_tablet`]
      ? `${slug}_tablet_` + props[`${slug}_tablet`]
      : "";
    let alignment_phone = props[`${slug}_phone`]
      ? `${slug}_phone_` + props[`${slug}_phone`]
      : "";

    return `${alignment} ${alignment_tablet} ${alignment_phone}`;
  };

  render() {
    const { props } = this;
    const { Utils } = window.ET_Builder.API;

    let dnxtiel_hover_image_alignment = this.getAlignment(
      props,
      "dnxtiel_hover_image_alignment"
    );
    let dnxtiel_button_alignment = this.getAlignment(
      props,
      "dnxtiel_button_alignment"
    );

    // Image hover effect
    const imgHover = () =>
      `imghvr-${props.dnxtiel_image_hover_effect} dnxtiel-imghvr-wrapper`;

    const useImageorIcon = () =>
      "off" !== props.dnxtiel_use_hover_image ||
      "off" !== props.dnxtiel_use_icon;

    return (
      <figure className={imgHover()}>
        <Image
          dynamicImg={props.dynamic.dnxtiel_image}
          lastEdited={props.dnxtiel_image_last_edited}
          hoverEnabled={props.dnxtiel_image__hover_enabled}
          imageTablet={props.dynamic.dnxtiel_image_tablet}
          imagePhone={props.dynamic.dnxtiel_image_phone}
          imageHover={props.dynamic.dnxtiel_image__hover}
          imgAlt={props.dynamic.dnxtiel_alt}
          classes="img-fluid"
        />
        <figcaption className="dnxtiel-imghvr-content">
          {useImageorIcon && (
            <div
              className={`dnxtiel-hover-image-wrapper ${dnxtiel_hover_image_alignment}`}
            >
              {"off" !== props.dnxtiel_use_hover_image && (
                <Image
                  dynamicImg={props.dynamic.dnxtiel_hover_image}
                  lastEdited={props.dnxtiel_hover_image_last_edited}
                  hoverEnabled={props.dnxtiel_hover_image__hover_enabled}
                  imageTablet={props.dynamic.dnxtiel_hover_image_tablet}
                  imagePhone={props.dynamic.dnxtiel_hover_image_phone}
                  imageHover={props.dynamic.dnxtiel_hover_image__hover}
                  imgAlt={props.dynamic.dnxtiel_hover_image_alt}
                  classes="dnxtiel-hover-image"
                />
              )}

              {"off" !== props.dnxtiel_use_icon && (
                <Icon
                  utils={Utils}
                  icon={props.dnxtiel_hover_icon || "N"}
                  classes="dnxtiel-hover-icon"
                />
              )}
            </div>
          )}
          <Title
            title={props.dnxtiel_heading_text}
            dynamicTitle={props.dynamic.dnxtiel_heading_text}
            tag={props.dnxtiel_heading_tag}
            classes="dnxtiel-heading"
          />
          <Description
            desc={props.dnxtiel_description}
            dynamicDesc={props.dynamic.dnxtiel_description}
            classes="dnxtiel-description"
          />
          {"off" !== props.dnxtiel_use_button && (
            <div
              className={`dnxtiel-hover-button-wrapper ${dnxtiel_button_alignment}`}
            >
              <Button
                text={props.dnxtiel_button_text}
                dynamicText={props.dynamic.dnxtiel_button_text}
                link={props.dnxtiel_button_link}
                linkTarget={props.dnxtiel_button_target}
                classes="dnxtiel-hover-button"
              />
            </div>
          )}
        </figcaption>
      </figure>
    );
  }
}

export default NextImageEffect;
