// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './style.css';


class MeteoApp extends Component {

  static slug = 'osex_meteo_app';

  render() {

    const $title = this.props.title;
    const $heading = this.props.$heading;
    const $image = this.props.image;
    const $content = this.props.content;
    const $use_icon = this.props.use_icon;

    return (

      <div class="meteo">
        <h2 class="build">{$title}</h2>
        <h3 class="build2">{$heading}</h3>
        <h3 class="img_import">{$image}</h3>
        <h1 class="titre">Météo Local</h1>
        <h4 class="emplacement">Votre Emplacement Actuel:</h4>
        <div class="location">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous" />
          <i class="fas fa-map-marker-alt" aria-hidden="true"></i> <p> - </p>
        </div>
        <div class="notification"></div>
        <div class="weather-container">
          <div class="weather-icon">
            <img src="https://margaux-dev.github.io/weather-app/icons-weather/unknown.svg" alt="temps" />
          </div>
          <div class="temperature-value">
            <p> - °<span>C</span></p>
          </div>
          <div class="temperature-description">
            <p> - </p>
          </div>
        </div>
        <img src={$image} />
        <p class="content_build">{$content}</p>
        <p class="icon_import">{$use_icon}</p>
      </div>

    );
  }
}

export default MeteoApp;
