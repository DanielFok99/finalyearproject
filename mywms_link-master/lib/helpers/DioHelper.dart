import 'package:dio/dio.dart';
import 'package:flutter/foundation.dart';
import 'package:mywms_link/helpers/SharedHelper.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/User.dart';

class DioHelper {
  final Dio _dio = Dio(options);

  final _baseUrl = 'https://reqres.in/api';


   static BaseOptions options = BaseOptions(
      // baseUrl: 'http://reqres.in/api',
      baseUrl: SharedHelper.instance.getString('base_url') ?? '',
      // baseUrl: _prefs?.getString("base_url"),
      responseType: ResponseType.json,
      // connectTimeout: 30000,
      // receiveTimeout: 30000,
    );

  Future<User?> getUser({required String id}) async {



    User? user;
    try {
      Response userData = await _dio.get('$_baseUrl/users/$id');
      debugPrint('User Info: ${userData.data}');
      user = User.fromJson(userData.data);
    } on DioError catch (e) {
      // The request was made and the server responded with a status code
      // that falls out of the range of 2xx and is also not 304.
      if (e.response != null) {
        debugPrint('Dio error!');
        debugPrint('STATUS: ${e.response?.statusCode}');
        debugPrint('DATA: ${e.response?.data}');
        debugPrint('HEADERS: ${e.response?.headers}');
      } else {
        // Error due to setting up or sending the request
        debugPrint('Error sending request!');
        debugPrint(e.message);
      }
    }
    return user;
  }

  Future<Response?> login({required String email,required String password, required String deviceName}) async {
    Response? response;

    debugPrint('BaseURL: ${_dio.options.baseUrl}');

    try {
      response = await _dio.post('/token');
      debugPrint('Token: ${response.data}');
      response = response.data;
    } on DioError catch (e) {
        debugPrint(e.message);
    }
    return response;
  }
}
