import 'dart:io';

import 'package:device_info_plus/device_info_plus.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/services.dart';
import 'package:mywms_link/helpers/DioHelper.dart';
import 'package:shared_preferences/shared_preferences.dart';

class AuthProvider extends ChangeNotifier {
  bool _isAuthenticated = false;

  bool get isAuthenticated => _isAuthenticated;

  final DioHelper _dioHelper = DioHelper();

  Future<bool> login(String email, String password) async {

    String deviceName = await getDeviceId();


    debugPrint(deviceName);

    var response = await _dioHelper.login(email: email, password: password, deviceName: deviceName);


    if (response?.statusCode == 200) {
      String token = response?.data;
      await saveToken(token);
      _isAuthenticated = true;
      notifyListeners();
      return true;
    }

    if (response?.statusCode == 422) {
      return false;
    }

    return false;
  }

  getDeviceId() async {
    final DeviceInfoPlugin deviceInfoPlugin = DeviceInfoPlugin();
    try {
      if (Platform.isAndroid) {
        var build = await deviceInfoPlugin.androidInfo;

        return build.id;
        // return build.androidId;
      } else if (Platform.isIOS) {
        var data = await deviceInfoPlugin.iosInfo;
        return data.identifierForVendor;
      }
    } on PlatformException {
      debugPrint('Failed to get platform version');
    }
  }

  saveToken(String token) async {
    final prefs = await SharedPreferences.getInstance();
    await prefs.setString('token', token);
  }

  Future<String?> getToken() async {
    final prefs = await SharedPreferences.getInstance();
    return prefs.getString('token');
  }

  logout() async {
    _isAuthenticated = false;
    // notifyListeners();

    final prefs = await SharedPreferences.getInstance();
    await prefs.clear();
  }
}