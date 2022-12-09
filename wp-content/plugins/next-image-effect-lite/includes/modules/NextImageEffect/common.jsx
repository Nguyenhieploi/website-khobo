import React from "react";

const Title = ({ title, dynamicTitle, tag = "h2", classes = "" }) => {
  if ("" === title) return "";
  const HeadingTag = tag;
  let titleText = dynamicTitle;
  let titleComponent = titleText.render();
  if (titleText.loading) return titleComponent;
  return <HeadingTag className={classes}>{titleComponent}</HeadingTag>;
};

const Description = ({ desc, dynamicDesc, classes = "" }) => {
  if ("" === desc) return "";
  let descComponent = dynamicDesc.render();
  if (dynamicDesc.loading) return descComponent;
  return (
    <div
      className={classes}
      dangerouslySetInnerHTML={{ __html: dynamicDesc.value }}
    />
  );
};

const Button = ({ text, dynamicText, link, linkTarget, classes = "" }) => {
  const validURL = (str) => {
    const pattern = /^((http|https|ftp):\/\/)/;
    if (!pattern.test(str)) return `http://${str}`;
    return str;
  };
  if ("" === text) return "";
  const validLink = validURL(link);
  let buttonComponent = dynamicText.render();
  if (dynamicText.loading) return buttonComponent;
  return (
    <a className={classes} href={validLink} target={linkTarget}>
      {buttonComponent}
    </a>
  );
};

const Image = ({
  dynamicImg,
  lastEdited,
  hoverEnabled,
  imageTablet,
  imagePhone,
  imageHover,
  imgAlt,
  classes = "",
}) => {
  let img = dynamicImg;
  if ("" === img.value) return "";

  if (img.loading) return img.render();

  if ("on|tablet" === lastEdited) {
    return (
      <img
        src={imageTablet.value ? imageTablet.value : img.value}
        alt={imgAlt.value}
        className={classes}
      />
    );
  } else if ("on|phone" === lastEdited) {
    return (
      <img
        src={
          imagePhone.value
            ? imagePhone.value
            : imageTablet.value
            ? imageTablet.value
            : img.value
        }
        alt={imgAlt.value}
        className={classes}
      />
    );
  } else if ("on|hover" === hoverEnabled) {
    return (
      <img
        src={imageHover.value ? imageHover.value : img.value}
        alt={imgAlt.value}
        className={classes}
      />
    );
  } else {
    return <img src={img.value} alt={imgAlt.value} className={classes} />;
  }
};

const Icon = ({ utils, tag = "span", icon, classes = "" }) => {
  if (icon === "") return "";
  const Tag = tag;
  const processedIcon = utils.processFontIcon(icon);

  return <Tag className={classes}>{processedIcon}</Tag>;
};

const applyBgCss = (css, props, backgroundObject) => {
  const {
    slug,
    use_color_gradient_slug,
    gradient,
    css_property,
  } = backgroundObject;
  let bg_style = "";
  let bg_style_tablet = "";
  let bg_style_phone = "";
  let bg_style_hover = "";
  let has_bg_gradient = null;
  let gradient_bg = "";
  let gradient_bg_tablet = "";
  let gradient_bg_phone = "";
  let gradient_bg_hover = "";

  const use_color_gradient = use_color_gradient_slug || "off";
  const gradient_type = props[gradient.type] ? props[gradient.type] : "linear";
  const gradient_direction = props[gradient.direction]
    ? props[gradient.direction]
    : "180deg";
  const gradient_radial = props[gradient.radial]
    ? props[gradient.radial]
    : "center";
  const gradient_start = props[gradient.start]
    ? props[gradient.start]
    : "#2b87da";
  const gradient_start_tablet = props[`${gradient.start}_tablet`];
  const gradient_start_phone = props[`${gradient.start}_phone`];
  const gradient_start_hover = props[`${gradient.start}__hover`];

  const gradient_end = props[gradient.end] ? props[gradient.end] : "#29c4a9";
  const gradient_end_tablet = props[`${gradient.end}_tablet`];
  const gradient_end_phone = props[`${gradient.end}_phone`];
  const gradient_end_hover = props[`${gradient.end}__hover`];

  const gradient_start_position = props[gradient.start_position]
    ? props[gradient.start_position]
    : "0%";
  const gradient_end_position = props[gradient.end_position]
    ? props[gradient.end_position]
    : "100%";

  // console.log(use_color_gradient);

  if (use_color_gradient === "on") {
    const direction =
      gradient_type === "linear"
        ? gradient_direction
        : `circle at ${gradient_radial}`;

    gradient_bg = `${gradient_type}-gradient(${direction}, ${gradient_start} ${gradient_start_position}, ${gradient_end} ${gradient_end_position})`;
    gradient_bg_tablet = `${gradient_type}-gradient(${direction}, ${gradient_start_tablet} ${gradient_start_position}, ${gradient_end_tablet} ${gradient_end_position})`;
    gradient_bg_phone = `${gradient_type}-gradient(${direction}, ${gradient_start_phone} ${gradient_start_position}, ${gradient_end_phone} ${gradient_end_position})`;
    gradient_bg_hover = `${gradient_type}-gradient(${direction}, ${gradient_start_hover} ${gradient_start_position}, ${gradient_end_hover} ${gradient_end_position})`;

    has_bg_gradient = true;
  } else {
    has_bg_gradient = false;
  }

  if (gradient_bg !== "") {
    bg_style = `background-image: ${gradient_bg} !important;`;
    bg_style_tablet = `background-image: ${gradient_bg_tablet} !important;`;
    bg_style_phone = `background-image: ${gradient_bg_phone} !important;`;
    bg_style_hover = `background-image: ${gradient_bg_hover} !important;`;
  }

  if (!has_bg_gradient) {
    const bg_color = props[slug];
    const bg_color_tablet = props[`${slug}_tablet`];
    const bg_color_phone = props[`${slug}_phone`];
    const bg_color_hover = props[`${slug}__hover`];

    if (bg_color !== "") {
      bg_style = `background-color: ${bg_color} !important;`;
      bg_style_tablet = `background-color: ${bg_color_tablet} !important;`;
      bg_style_phone = `background-color: ${bg_color_phone} !important;`;
      bg_style_hover = `background-color: ${bg_color_hover} !important;`;
    }
  }

  css.push([
    {
      selector: css_property.desktop,
      declaration: bg_style,
    },
  ]);

  css.push([
    {
      selector: css_property.desktop,
      declaration: bg_style_tablet,
      device: "tablet",
    },
  ]);

  css.push([
    {
      selector: css_property.desktop,
      declaration: bg_style_phone,
      device: "phone",
    },
  ]);

  css.push([
    {
      selector: css_property.hover,
      declaration: bg_style_hover,
    },
  ]);

  return;
};

export { Title, Description, Button, Image, Icon, applyBgCss };
