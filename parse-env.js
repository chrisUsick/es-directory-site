/**
 * This file exports a function that can be passed to webpack as a DefinePlugin handler.
 * It reads a bash-like environment file full of export statements and maps each to a
 * property like 'process.env.FOO' to emulate the way Node.js handles environment vars.
 * If your shell has environment variables set, they are given preference over variables
 * in the environment file.
 */
var fs = require('fs');
var path = require('path');

var parseEnvFile = function (file) {
  try {
    var contents = fs.readFileSync(file, 'utf-8');
  } catch (e) {
    return {};
  }

  var environmentObject = {};
  contents = contents.split('\n');

  contents.forEach(function (line, index, scope) {
    // strip comments
    line = line.replace(/(^#| #)(.+?)$/, '');

    // skip empty lines
    if (line.trim() === '') {
      return;
    }

    // split on NAME=value. Lines may start with "export "
    var lineParts = line.match(/^(export )?([^=]+)=(.+?)$/);

    // map 'NAME=value' to {NAME: value}
    environmentObject[lineParts[2]] = lineParts[3];
  });

  return environmentObject;
}

/**
 * Return environment variables and lines from an environment-looking file
 * in a format that can be used by Webpack's DefinePlugin. Returns an object
 * full of key-value pairs like:
 * {'process.env.ENV_VAR': '"string value"'}
 *
 * @see https://webpack.github.io/docs/list-of-plugins.html#defineplugin
 *
 */
module.exports = function (envFile) {
  var environmentFromFile = parseEnvFile(envFile);
  var combinedEnv = {};

  // Add
  for (var key in environmentFromFile) {
    if (environmentFromFile.hasOwnProperty(key)) {
      combinedEnv['process.env.' + key] = JSON.stringify(environmentFromFile[key]);
    }
  }

  // Prefer actual environment variables over anything from the file.
  for (var key in process.env) {
    if (process.env.hasOwnProperty(key)) {
      combinedEnv['process.env.' + key] = JSON.stringify(process.env[key]);
    }
  }

  return combinedEnv;
};