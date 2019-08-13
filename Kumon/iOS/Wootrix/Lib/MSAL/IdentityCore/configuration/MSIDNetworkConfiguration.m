// Copyright (c) Microsoft Corporation.
// All rights reserved.
//
// This code is licensed under the MIT License.
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files(the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and / or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions :
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.

#import "MSIDNetworkConfiguration.h"

static NSTimeInterval const s_defaultTimeout = 30;
static int const s_defaultRetryCount = 2;

@implementation MSIDNetworkConfiguration

- (instancetype)init
{
    self = [super init];
    if (self)
    {
        _timeout = s_defaultTimeout;
        _retryCount = s_defaultRetryCount;
    }
    return self;
}

- (instancetype)initWithTimeout:(NSTimeInterval)timeout retryCount:(int)retryCount
{
    self = [super init];
    if (self)
    {
        _timeout = timeout;
        _retryCount = retryCount;
    }
    return self;
}

- (instancetype)copyWithZone:(NSZone*)zone
{
    MSIDNetworkConfiguration *configuration = [[MSIDNetworkConfiguration allocWithZone:zone] init];
    configuration.timeout = _timeout;
    configuration.retryCount = _retryCount;
    
    return configuration;
}


@end
